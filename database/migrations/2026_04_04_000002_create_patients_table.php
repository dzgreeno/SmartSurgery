<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('maiden_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('blood_type')->nullable();      // A+, B-, O+, AB+, etc.
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('insurance_number')->nullable();  // CNAS / CASNOS
            $table->string('insurance_type')->nullable();    // CNAS, CASNOS, libre
            $table->string('admission_number')->nullable();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->string('room')->nullable();
            $table->string('bed')->nullable();
            $table->enum('status', ['hospitalized', 'discharged', 'transferred', 'deceased'])->default('hospitalized');
            $table->date('admission_date')->nullable();
            $table->date('discharge_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
