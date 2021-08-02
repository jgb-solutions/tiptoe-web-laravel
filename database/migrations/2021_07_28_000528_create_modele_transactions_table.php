<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_transactions', function (Blueprint $table) {
            $table->engine = ' MyISAM';
            $table->id();
            $table->unsignedInteger('modele_id');
            $table->bigInteger('amount');
            $table->string('type');
            $table->timestamps();

            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_transactions');
    }
}