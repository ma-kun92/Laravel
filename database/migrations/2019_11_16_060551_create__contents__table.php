<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('main_discription');
            $table->string('main_image');
            $table->string('main_capture');
            $table->string('second_image');
            $table->string('second_capture');
            $table->text('second_discription');
            $table->string('third_image');
            $table->string('third_capture');
            $table->text('third_discription');
            $table->string('display_flg');
            $table->string('status_flg');
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
        Schema::dropIfExists('contents');
    }
}
