<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('degree');              // e.g. B.Sc. in Computer Science & Engineering
            $table->string('institution');         // e.g. University of Dhaka, Dhaka College, etc.
            $table->string('level')->nullable();   // School, College, University
            $table->string('result');              // e.g. CGPA: 3.85 / 4.00, GPA 5.00
            $table->string('duration');            // e.g. 2020 - 2024, 2018 - 2020
            $table->string('field_of_study')->nullable(); // e.g. Computer Science, Science
            $table->text('description')->nullable();      // key achievements, coursework, honors
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
