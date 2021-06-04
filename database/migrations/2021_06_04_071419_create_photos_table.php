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
            $table->id();
            $table->bigInteger('modele_id');
            $table->bigInteger('category_id');
            $table->string('uri');
            $table->string('image_bucket');
            $table->string('caption');
            $table->text('detail')->nullable();
            $table->boolean('featured')->nullable();
            $table->integer('has');
            $table->boolean('publish')->default(false);
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
        Schema::dropIfExists('photos');
    }
}