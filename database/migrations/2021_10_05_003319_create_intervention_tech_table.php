<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionTechTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention_tech', function (Blueprint $table) {
         $table->unsignedBigInteger('technicien_id');
         $table->foreign('technicien_id')->references('id')->on('techniciens')->onDelete('cascade')->nullable();
         $table->unsignedBigInteger('intervention_id');
         $table->foreign('intervention_id')->references('id')->on('interventions')->onDelete('cascade')->nullable();
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervention_tech');
    }
}
