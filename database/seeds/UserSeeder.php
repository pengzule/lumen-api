<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run()
    {
        app('db')->table('users')->delete();

        $user = app()->make('App\User');
        $hasher = app()->make('hash');


        for ($i=0; $i < 10; $i++) {
            $user->fill([
                'name' => 'GenericAgent'.$i,
                'ip' => '192.168.226.'.$i,
                'port' => '8'.$i,
                'parent'=>'127.0.0.1:80'
            ]);
            $user->save();
        }

    }

}