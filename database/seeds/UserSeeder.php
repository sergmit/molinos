<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Name';
        $user->email = 'mitugov@bk.ru';
        $user->password = Hash::make('qwerty');
        $user->save();
    }
}
