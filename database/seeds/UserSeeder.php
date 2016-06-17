<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run()
    {
        app('db')->table('users')->delete();

        $user = app()->make('App\User');
        $hasher = app()->make('hash');

        $user->fill([
            'name' => 'pengzule',
            'email' => '295129789@qq.com',
            'password' => $hasher->make('123456')
        ]);
        $user->save();
    }

}