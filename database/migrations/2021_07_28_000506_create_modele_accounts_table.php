<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_accounts', function (Blueprint $table) {
            $table->engine = ' MyISAM';
            $table->id();
            $table->unsignedInteger('modele_id');
            $table->bigInteger('account');
            $table->bigInteger('balance');
            $table->timestamps();

            $table->foreign('modele_id')->references('id')->on('modeles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_accounts');
    }
}