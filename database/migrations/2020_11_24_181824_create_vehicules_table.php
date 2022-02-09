<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('marque');
            $table->string('model');
            $table->string('chassi');
            $table->enum('type', ['Mini', 'Berline', 'SUV/4x4/']);
            $table->string('annee')->nullable();
            $table->integer('km');
            $table->enum('type_contrat', ['contractuelle', 'non contractuelle']);
            $table->string('date_in');
            $table->string('date_out')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
