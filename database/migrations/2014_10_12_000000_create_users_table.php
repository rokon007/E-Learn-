<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('language');
            $table->string('whatsapp_number')->unique();
            $table->string('email')->unique();
            $table->string('reference_no')->nullable();
            $table->decimal('balance', 10, 2)->default(0);
            $table->string('password');
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending');
            $table->string('unique_id')->unique();
            $table->enum('role', ['admin', 'trainer', 'student'])->default('student');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
