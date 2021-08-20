<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->engine = ' MyISAM';
            $table->id();
            $table->bigInteger('modele_id');
            $table->bigInteger('category_id')->nullable();
            $table->string('uri');
            $table->string('bucket');
            $table->string('type');
            $table->string('caption')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('featured')->nullable();
            $table->string('hash');
            $table->boolean('publish')->default(false);
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
        Schema::dropIfExists('photos');
    }
}