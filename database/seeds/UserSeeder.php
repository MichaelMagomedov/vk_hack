<?php

use App\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.ru',
            'name' => 'admin',
            'password' => bcrypt('adminadmin123')
        ]);
    }
}
