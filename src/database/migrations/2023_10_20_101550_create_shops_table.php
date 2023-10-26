<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->unsignedBigInteger('prefecture_id');
            $table->unsignedBigInteger('genre_id');
            $table->text('shop_detail');
            $table->string('image_url');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
