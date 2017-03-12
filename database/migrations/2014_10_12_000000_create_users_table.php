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
            $table->integer('status')->default(0); //0: disabled, 1: active(verified), 5: admin
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('cover_image')->default('default.png');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0); //0: unread, 1: read
            $table->integer('receiver_id'); //0: admin, others: user_id
            $table->text('notification');
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
