<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_slider', function (Blueprint $table) {
            $table->bigIncrements('slider_id');
            $table->string('name');
            $table->string('original_image_name');
            $table->string('image_url');
            $table->string('caption', 1);
            $table->string('display_flg',1);
            $table->string('status_flg', 1);
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_contact2');
    }
}
