<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('surgery_type');
            $table->text('description')->nullable();
            $table->date('requested_date');
            $table->enum('status', ['pending', 'approved', 'rejected', 'scheduled'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demands');
    }
}
