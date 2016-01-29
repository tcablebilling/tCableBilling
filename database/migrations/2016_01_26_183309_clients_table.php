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
            $table->string('client_id');
            $table->bigInteger('area');
            $table->string('name');
            $table->string('phone_no_1');
            $table->string('phone_no_2');
            $table->string('address');
            $table->enum('connection_type', ['home', 'office', 'business', 'govt']);
            $table->bigInteger('channel_package');
            $table->enum('client_status', ['active', 'suspended', 'deactive']);
            $table->enum('address_proof', ['voter_id', 'passport', 'electricity_bill', 'gas_bill', 'driving_license']);
            $table->string('address_proof_no');
            $table->string('device_box_no');
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
