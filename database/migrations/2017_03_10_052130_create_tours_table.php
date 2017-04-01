<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->string('type'); //az or en
            $table->integer('user_id');
            $table->string('title_az');
            $table->string('title_en');
            $table->dateTime('expire_date');
            $table->integer('price');
            $table->string('currency');
            $table->integer('is_hot')->default(0);
            $table->text('description_az');
            $table->text('description_en');
            $table->timestamps();
        });

        Schema::create('tours_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->string('image_name');
            $table->integer('tour_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sortname');
            $table->integer('phonecode');
            $table->integer('status')->default(1);
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('status')->default(1);
            $table->string('name');
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->string('name');
            $table->integer('state_id');
            $table->integer('country_id');
            $table->timestamps();
        });

        Schema::create('tours_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->integer('country_id')->unsigned();
            $table->integer('tour_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('tours_cities', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('status')->default(1);
        $table->integer('city_id')->unsigned();
        $table->integer('tour_id')->unsigned();
        $table->timestamps();
    });

        Schema::create('tours_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1);
            $table->integer('tour_id')->unsigned();
            $table->string('photo');
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
        Schema::dropIfExists('tours');
    }
}
