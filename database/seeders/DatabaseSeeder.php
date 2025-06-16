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
        $this->call([
            CourseDescriptionsSeeder::class,
        ]);


         $this->call([
            CourseSeeder::class,
        ]);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
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
