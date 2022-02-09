<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_interventions', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('prix');
            $table->integer('echeance')->nullable();
            
            $table->unsignedBigInteger('offre_id');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('action_interventions');
    }
}
