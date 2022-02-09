<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffreVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offre_vehicule', function (Blueprint $table) {
         $table->unsignedBigInteger('offre_id')->nullable();
         $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade')->nullable();
         $table->unsignedBigInteger('vehicule_id')->nullable();
         $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade')->nullable();
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre_vehicule');
    }
}
