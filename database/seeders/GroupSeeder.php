<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::insert([
            [
                'name' => 'Группа 1',
                'expire_hours' => 1
            ],
            [
                'name' => 'Группа 2',
                'expire_hours' => 2
            ]
        ]);
    }
}
