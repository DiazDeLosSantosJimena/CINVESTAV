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

        Roles::create([
            'name' => 'Público General',
        ]);

        Roles::create([
            'name' => 'Invitado Especial',
        ]);

        User::create([
            'name' => 'Admin',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'Mtro',
            'email' => 'admin@cinvestav.com',
            'password' => Hash::make('admin'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 1,
        ]);

        User::create([
            'name' => 'Admin2',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'Mtro',
            'email' => 'edu@cinvestav.com',
            'password' => Hash::make('admin'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 1,
        ]);

        User::create([
            'name' => 'Juez 1',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'Mtro',
            'email' => 'juez1@cinvestav.com',
            'password' => Hash::make('juez'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 2,
        ]);

        User::create([
            'name' => 'Juez 2',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'Mtro',
            'email' => 'juez2@cinvestav.com',
            'password' => Hash::make('juez'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 2,
        ]);

        User::create([
            'name' => 'Juez 3',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'Mtro',
            'email' => 'juez3@cinvestav.com',
            'password' => Hash::make('juez'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 2,
        ]);

        User::create([
            'name' => 'Ponente',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'contact@cinvestav.com',
            'email' => 'user@cinvestav.com',
            'password' => Hash::make('user'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 3,
        ]);

        User::create([
            'name' => 'Jossue',
            'app' => 'Alejandro',
            'apm' => 'Candelas',
            'photo' => '20230824203409ponente.png',
            'phone' => '7293579266',
            'alternative_contact' => 'jossueale02@hotmail.com',
            'email' => 'jossueale@hotmail.com',
            'password' => Hash::make('elJossue123'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 3,
        ]);

        User::create([
            'name' => 'Publico General',
            'app' => '-',
            'apm' => 'CINVESTAV',
            'photo' => 'default.jpg',
            'phone' => '0000000000',
            'alternative_contact' => 'contact@cinvestav.com',
            'email' => 'publico@cinvestav.com',
            'password' => Hash::make('publico'),
            'country' => 'México',
            'state' => 'México',
            'municipality' => 'Toluca',
            'rol_id' => 4,
        ]);

    }
}
