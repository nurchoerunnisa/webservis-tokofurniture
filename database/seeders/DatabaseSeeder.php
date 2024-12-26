<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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

        // Permission & Roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'pelanggan']);

        // Users
        $admin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@furniture.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $pelanggan = \App\Models\User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@furniture.com',
            'password' => bcrypt('12345678'),
        ]);
        $pelanggan->assignRole('pelanggan');

        $this->call([
            BarangSeeder::class,
        ]);
    }
}
