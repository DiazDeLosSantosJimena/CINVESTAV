<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        Roles::create([
            'name' => 'admin',
        ]);

        Roles::create([
            'name' => 'evaluador',
        ]);

        Roles::create([
            'name' => 'postulante',
        ]);

        User::create([
            'title' => 'Mr',
            'name' => 'Admin',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'fn' => '2000-01-01',
            'number' => '0000000000',
            'email' => 'admin@cinvestav.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);

        User::create([
            'title' => 'Mr',
            'name' => 'Evaluador',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'fn' => '2000-01-01',
            'number' => '0000000000',
            'email' => 'viewer@cinvestav.com',
            'password' => Hash::make('viewer'),
            'role_id' => 2,
        ]);

        User::create([
            'title' => 'Mr',
            'name' => 'Postulante',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'fn' => '2000-01-01',
            'number' => '0000000000',
            'email' => 'user@cinvestav.com',
            'password' => Hash::make('user'),
            'role_id' => 3,
        ]);

    }
}
