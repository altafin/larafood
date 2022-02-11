<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Marcelo Luiz',
            'email' => 'a@a.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
