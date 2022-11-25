<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Thematic;
use App\Models\Table;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Thematic::factory()->count(5)->create();
        Table::factory()->count(8)->create();
        User::factory()->count(10)->create();
    }
}
