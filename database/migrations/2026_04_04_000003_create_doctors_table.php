<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('firebase_uid')->nullable()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('specialty');
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->string('phone')->nullable();
            $table->integer('experience_years')->default(0);
            $table->string('grade')->nullable();        // Professeur, Maitre-assistant, Résident
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
