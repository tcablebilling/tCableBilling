<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationBetweenClientsAndPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('package_id')->after('connection_type')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('clients')) {
            Schema::table('clients', function (Blueprint $table) {
                if( Schema::hasColumn( 'clients', 'package_id' ) )
                {
                    $table->dropForeign(['package_id']);
                    $table->dropColumn('package_id');
                }
            });
        }
    }
}
