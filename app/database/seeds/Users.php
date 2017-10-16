<?php

class Users extends Seeder {

    public function run()
    {
       DB::table('users')->delete();

        $u = new User;

        $u-> login='Splin';
        $u-> password='123';
        $u-> save();

    }

}
