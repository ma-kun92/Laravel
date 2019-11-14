<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTbContact2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tb_contact2', function (Blueprint $table) {
          $table->string('status_flg', 1)->after('content');
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
          $table->dropColumn('status_flg');
      });
    }
}
