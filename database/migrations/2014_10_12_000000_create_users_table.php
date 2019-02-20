<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->increments('id');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
          $table->tinyInteger('email_verified')->default(0);
          $table->string('email_verify_token')->nullable();
          $table->tinyInteger('status')->default(0);
          $table->string('name_pronunciation')->nullable();
          $table->integer('birth_year')->nullable();
          $table->integer('birth_month')->nullable();
          $table->integer('birth_day')->nullable();
          $table->timestamp('verify_at')->nullable();
          $table->string('name')->default('')->nullable();
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
