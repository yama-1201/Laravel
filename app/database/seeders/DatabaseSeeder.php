<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // factory
        $this->call(UsersTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(BookmarksTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
