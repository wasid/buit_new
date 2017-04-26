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
			$table->string('vendor_name');
			$table->string('delivery_date');
			$table->string('printer');
			$table->string('printer_assetno');
			$table->string('scanner');
			$table->string('scanner_assetno');
			$table->string('ups');
			$table->string('ups_assetno');
			$table->string('department');
			$table->string('status');
			$table->text('comment');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
