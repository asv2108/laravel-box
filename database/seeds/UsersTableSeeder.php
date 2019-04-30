<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run() :void
    {
        factory(User::class, 10)->create();
    }
}
