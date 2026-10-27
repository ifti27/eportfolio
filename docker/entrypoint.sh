#!/bin/sh
set -e

echo "==> Preparing Laravel for production..."

# Ensure storage directory structure
mkdir -p storage/app/public storage/framework/cache storage/framework/sessions storage/framework/views storage/logs
chmod -R 775 storage bootstrap/cache

# Generate app key if missing
if [ -z "$APP_KEY" ]; then
    echo "==> Generating application key..."
    php artisan key:generate --force
fi

# Link storage
echo "==> Creating storage symbolic link..."
php artisan storage:link --force || true

# Run database migrations if DB is configured
if [ -n "$DB_HOST" ] || [ -n "$DB_URL" ] || [ -n "$DATABASE_URL" ]; then
    echo "==> Running database migrations..."
    php artisan migrate --force || true
fi

# Cache configurations, routes, and views for high performance
echo "==> Caching application configurations and views..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Determine port
PORT_TO_USE="${PORT:-10000}"
echo "==> Starting Laravel server on port $PORT_TO_USE..."

exec php artisan serve --host=0.0.0.0 --port="$PORT_TO_USE"
