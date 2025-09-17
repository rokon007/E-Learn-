<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('trainer_id')->constrained('users');
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->integer('duration')->default(0); // in hours
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->string('category');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
