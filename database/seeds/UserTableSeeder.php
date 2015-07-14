<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        User::create([
            'id'            => 1,
            'name'      => 'morgan',
            'email'         => 'morgan.davison@gmail.com',
            'password'      => bcrypt('password1234')
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}