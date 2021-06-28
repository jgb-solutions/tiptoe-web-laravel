<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = ' MyISAM';
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_reset_code')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('admin')->default(false);
            $table->boolean('first_login')->default(true);
            $table->text('avatar')->nullable();
            $table->string('gender');
            $table->string('telephone');
            $table->string('user_type');
            $table->text('bucket')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}