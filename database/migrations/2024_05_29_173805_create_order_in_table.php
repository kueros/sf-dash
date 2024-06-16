<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('order_in', function (Blueprint $table) {
			$table->id();
			$table->string('store_id', 50);
			$table->string('order_id', 50);
			$table->string('index_id', 50);
			$table->string('order_nro', 210);
			$table->string('fechacre', 210);
			$table->timestamp('tstamp');
			$table->string('respcode', 180);
			$table->string('status', 60);
			$table->string('resmessage', 180);
			$table->string('trackid', 75);
			$table->string('shipment_id', 50);
			$table->string('print_url', 200);
			$table->string('code', 4);
			$table->string('email', 300);
			$table->string('idstore', 60)->nullable();
			$table->string('financial_status', 50);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('order_in');
	}
};
