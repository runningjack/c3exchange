<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/6/14
 * Time: 6:55 AM
 */

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'fname'     => 'Ahmed',
            'lname'     =>'Ogansehun',
            'username' => 'amedora',
            'phone'   => '08063577714',
            'email'    => 'amedora09@gmail.com',
            'password' => Hash::make('meda2012'),
        ));
    }
} 