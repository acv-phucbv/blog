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
            $table->increments('id', true);
            $table->string('username', 31)->unique();
            $table->string('password', 191);
            $table->string('email', 191)->unique();
            $table->string('fullname', 191)->nullable();
            $table->tinyInteger('role')->comment('1: super admin; 2: admin; 3: author');
            $table->tinyInteger('gender')->nullable()->comment('1: male; 2: female');
            $table->date('birthday')->nullable();
            $table->string('avatar', 191)->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
