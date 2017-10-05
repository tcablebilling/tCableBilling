<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone_no_1');
            $table->string('phone_no_2')->nullable();
            $table->string('address');
            $table->enum('connection_type', ['home', 'office', 'business', 'govt']);
            $table->enum('client_status', ['Active', 'Deactive']);
            $table->enum('address_proof', ['voter_id', 'passport', 'electricity_bill', 'gas_bill', 'driving_license'])->nullable();
            $table->string('address_proof_no')->nullable();
            $table->string('device_box_no')->nullable();
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
        // Schema::table('clients', function (Blueprint $table) {
        //     //
        // });
        Schema::drop('clients');
    }
}
