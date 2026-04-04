<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationsTable extends Migration
{
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // Paracetamol, Amoxicillin, etc.
            $table->string('name_ar')->nullable();  // باراسيتامول
            $table->string('category');             // مضادات حيوية, مسكنات, مضادات التخثر
            $table->string('dosage_form');          // قرص, أمبولة, حقنة, شراب
            $table->string('strength')->nullable(); // 500mg, 1g, etc.
            $table->integer('stock_quantity')->default(0);
            $table->integer('min_stock')->default(10);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medications');
    }
}
