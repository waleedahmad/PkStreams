<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Waleed Ahmad';
        $user->password = bcrypt('binarystar');
        $user->email = 'waleedgplus@gmail.com';
        $user->type = 'admin';
        if($user->save()){
            echo 'User Created';
        }
    }
}
