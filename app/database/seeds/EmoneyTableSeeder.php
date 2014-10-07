<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/7/14
 * Time: 11:26 AM
 */

class EmoneyTableSeeder  extends Seeder {
    public function run()
    {
        DB::table('emoneys')->delete();
        Emoney::create(array(
            'ecurrency'     => 'perfectmoney',
            'shortname'     =>'PM',
            'currency' => 'USD',
            'img_url'   => '',
            'web_url'    => '',
            'accountid' => ''
        ));
    }
} 