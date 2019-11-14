<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTbContact2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_contact2', function (Blueprint $table) {
            $table->renameColumn('created_at', 'make_time');
            $table->renameColumn('updated_at', 'update_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_contact2', function (Blueprint $table) {
            $table->renameColumn('make_time', 'created_at');
            $table->renameColumn('update_time', 'updated_at');
        });
    }
}
