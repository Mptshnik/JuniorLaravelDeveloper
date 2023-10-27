<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Иван',
                'email' => 'cheburkov123@mail.ru'
            ],
            [
                'name' => 'Вася',
                'email' => 'cheburkov1234@mail.ru'
            ]
        ]);
    }
}
