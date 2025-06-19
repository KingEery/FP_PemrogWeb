<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CourseDescriptionsSeeder::class,
        ]);


         $this->call([
            CourseSeeder::class,
        ]);


        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // ganti password sesuai kebutuhan
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'), // ganti password sesuai kebutuhan
            'role' => 'user',
        ]);

        $this->call([
            EventSeeder::class,
        ]);
         $this->call([
            EventDescriptionSeeder::class,
        ]);
        $this->call([
            MentoringSeeder::class,
        ]);
        $this->call([
            MentoringDescriptionSeeder::class,
        ]);

    }
}
