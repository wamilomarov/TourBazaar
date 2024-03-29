<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->integer('tour_id');
            $table->integer('user_id');
            $table->string('client_full_name', 100);
            $table->string('client_email', 100);
            $table->string('client_phone', 50);
            $table->integer('user_seen')->default(0);
            $table->integer('admin_seen')->default(0);
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
        Schema::dropIfExists('requests');
    }
}
