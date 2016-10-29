<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('location_id')->unsigned()->nullable()->index();
            $table->string('cpu_name');
			$table->string('cpu_assetno');
			$table->string('ip')->unique();
			$table->string('mac');
			$table->string('u_name');
			$table->string('u_email');
			$table->string('pc_type');
			$table->string('processor');
			$table->string('motherboard');
			$table->string('ram');
			$table->string('hdd');
			$table->string('monitor');
			$table->string('monitor_assetno');
			$table->string('printer');
			$table->string('printer_assetno');
			$table->string('scanner');
			$table->string('scanner_assetno');
			$table->string('ups');
			$table->string('ups_assetno');
			$table->string('department');
			$table->text('comment');
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
        Schema::drop('labs');
    }
}
