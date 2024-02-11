<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotreTravailsTable extends Migration
{
   
    public function up()
    {
        Schema::create('notre_travails', function (Blueprint $table) {
            $table->id();
            $table->text('description_ar');
            $table->text('description_fr');
            $table->string('link');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('notre_travails');
    }
}
