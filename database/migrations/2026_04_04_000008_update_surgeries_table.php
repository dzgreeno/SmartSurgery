<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSurgeriesTable extends Migration
{
    public function up()
    {
        Schema::table('surgeries', function (Blueprint $table) {
            $table->foreignId('department_id')->nullable()->after('room')->constrained()->nullOnDelete();
            $table->foreignId('patient_id')->nullable()->after('department_id')->constrained()->nullOnDelete();
            $table->string('doctor_uid')->nullable()->after('patient_id');
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled')->after('doctor_uid');
            $table->text('notes')->nullable()->after('status');
            $table->time('surgery_time')->nullable()->after('surgery_date');
        });
    }

    public function down()
    {
        Schema::table('surgeries', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['patient_id']);
            $table->dropColumn(['department_id', 'patient_id', 'doctor_uid', 'status', 'notes', 'surgery_time']);
        });
    }
}
