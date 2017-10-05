<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();

        $areas = [
            [ 'name'=>'Kumarpara', 'code'=>'KUM', 'created_at'=>'2016-02-03 11:10:30', 'updated_at'=>'2016-02-03 11:10:30'],
            [ 'name'=>'Jharnar Par', 'code'=>'JNP', 'created_at'=>'2016-02-03 11:11:03', 'updated_at'=>'2016-02-03 11:11:03'],
            [ 'name'=>'Sawdagar Tula', 'code'=>'SDT', 'created_at'=>'2016-02-03 11:11:24', 'updated_at'=>'2016-02-03 11:11:24'],
            [ 'name'=>'Naiorpool', 'code'=>'NAIP', 'created_at'=>'2016-02-03 11:11:57', 'updated_at'=>'2016-02-03 11:11:57'],
            [ 'name'=>'Mira Bazar', 'code'=>'MRBZ', 'created_at'=>'2016-02-03 11:12:22', 'updated_at'=>'2016-02-03 11:12:22'],
            [ 'name'=>'Dhopa Dighir Par', 'code'=>'DHDP', 'created_at'=>'2016-02-03 11:12:49', 'updated_at'=>'2016-02-03 11:12:49'],
            [ 'name'=>'Jail Road', 'code'=>'JRD', 'created_at'=>'2016-02-03 11:13:06', 'updated_at'=>'2016-02-03 11:13:06'],
            [ 'name'=>'Barut Khana', 'code'=>'BKHN', 'created_at'=>'2016-02-03 11:13:32', 'updated_at'=>'2016-02-03 11:13:32'],
            [ 'name'=>'Puran Lane', 'code'=>'PRLN', 'created_at'=>'2016-02-03 11:14:06', 'updated_at'=>'2016-02-03 11:14:06'],
            [ 'name'=> 'Lal Bazar', 'code'=>'LBZR', 'created_at'=>'2016-02-03 11:14:30', 'updated_at'=>'2016-02-03 11:14:30'],
            [ 'name'=> 'Bondor', 'code'=>'BNDR', 'created_at'=>'2016-02-03 11:15:07', 'updated_at'=>'2016-02-03 11:15:07']
        ];

        DB::table('areas')->insert($areas);
    }
}
