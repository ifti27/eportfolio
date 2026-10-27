<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');               // e.g. Champion - National Hackathon 2023
            $table->string('category')->default('Award'); // Award, Competition, Certification, Honor
            $table->string('issuer');              // e.g. ICT Ministry, University Faculty
            $table->string('year');                // e.g. 2023, Nov 2023
            $table->text('description');           // Short description of the award / achievement
            $table->string('link')->nullable();    // Certificate or verification URL
            $table->string('icon')->nullable();    // Optional icon or emoji
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
