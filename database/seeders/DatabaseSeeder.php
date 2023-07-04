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
            'academic_degree' => 'Mr',
            'name' => 'Admin',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'phone' => '0000000000',
            'email' => 'admin@cinvestav.com',
            'password' => Hash::make('admin'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'assistance' => 'p',
            'rol_id' => 1,
        ]);

        User::create([
            'academic_degree' => 'Mr',
            'name' => 'Juez 1',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'phone' => '0000000000',
            'email' => 'juez1@cinvestav.com',
            'password' => Hash::make('juez'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'assistance' => 'p',
            'rol_id' => 2,
        ]);

        User::create([
            'academic_degree' => 'Mr',
            'name' => 'Ponente',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'phone' => '0000000000',
            'email' => 'user@cinvestav.com',
            'password' => Hash::make('user'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'assistance' => 'p',
            'rol_id' => 3,
        ]);

    }
}
