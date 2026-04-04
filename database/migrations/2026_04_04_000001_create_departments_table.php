<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // e.g. "Chirurgie Femmes"
            $table->string('name_ar');        // e.g. "جراحة النساء"
            $table->string('code')->unique(); // e.g. "surgery_women"
            $table->string('head_name')->nullable();
            $table->string('type')->default('surgery'); // surgery, medical, support
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
