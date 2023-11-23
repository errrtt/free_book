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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roles = ['User', 'Admin'];

        foreach($roles as $role) {
            \App\Models\Role::create([
                'name' => $role,
            ]);
        }

        \App\Models\User::factory()->create([
            'name' => 'Win Htut Aung',
            'email' => 'winhtut@gmail.com',
            'role_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
        ]);

        \App\Models\User::factory(5)->create();
    }
}
