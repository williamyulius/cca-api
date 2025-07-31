<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => '1911084',
            'name' => 'Yulius',
            'level' => '3',
            'email' => 'william.yulius@santa-laurensia.sch.id',
            'password' => '88c306a6397f8c1872fea916cfc6e781',
        ]);
    }
}
