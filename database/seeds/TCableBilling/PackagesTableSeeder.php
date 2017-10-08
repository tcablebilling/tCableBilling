<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->delete();

        $packages = [
            [ 'name'=>'D-SILVER-300', 'fee'=>300, 'created_at'=>'2016-02-02 08:49:12', 'updated_at'=>'2016-02-02 08:49:12'],
            [ 'name'=>'D-GOLD-400', 'fee'=>400, 'created_at'=>'2016-02-02 08:51:07', 'updated_at'=>'2016-02-02 08:51:07'],
            [ 'name'=>'D-PLATINUM-500', 'fee'=>500, 'created_at'=>'2016-02-02 08:51:51', 'updated_at'=>'2016-02-02 08:51:51'],
            [ 'name'=>'A-GOLD-400', 'fee'=>400, 'created_at'=>'2016-02-02 08:52:30', 'updated_at'=>'2016-02-02 08:52:30'],
            [ 'name'=>'A-SILVER-A-350', 'fee'=>350, 'created_at'=>'2016-02-02 08:52:56', 'updated_at'=>'2016-02-02 08:52:56'],
            [ 'name'=>'A-SILVER-B-300', 'fee'=>300, 'created_at'=>'2016-02-02 08:53:26', 'updated_at'=>'2016-02-02 08:53:26'],
            [ 'name'=>'A-SILVER-C-250', 'fee'=>250, 'created_at'=>'2016-02-02 08:53:54', 'updated_at'=>'2016-02-02 08:53:54'],
            [ 'name'=>'A-SILVER-D-200', 'fee'=>200, 'created_at'=>'2016-02-02 08:54:19', 'updated_at'=>'2016-02-02 08:54:19']
        ];

        DB::table('packages')->insert($packages);
    }
}
