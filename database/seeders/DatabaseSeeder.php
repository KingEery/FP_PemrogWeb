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


        User::firstOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin',
        'password' => Hash::make('admin123'),
        'role' => 'admin',
    ]
);

User::firstOrCreate(
    ['email' => 'user@example.com'],
    [
        'name' => 'User Biasa',
        'password' => Hash::make('user123'),
        'role' => 'user',
    ]
);

         $this->call([
            EventDescriptionSeeder::class,
        ]);
       
        $this->call([
            MentoringDescriptionSeeder::class,
        ]);
        $this->call([
            ConsultantsSeeder::class,
        ]);
        $this->call([
            FreeTrialsSeeder::class,
        ]);

        $this->call(TeamMemberSeeder::class);


    }
}
