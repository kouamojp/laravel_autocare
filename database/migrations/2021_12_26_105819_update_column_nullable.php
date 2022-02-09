<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_interventions', function (Blueprint $table) {
            $table->integer('echeance')->nullable()->change();
            $table->integer('prix')->nullable()->change();
            $table->string('titre')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_interventions', function (Blueprint $table) {
            //
        });
    }
}
