<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = \Carbon\Carbon::now();

        $user = User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password'=>Hash::make('admin'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'service social',
                'email' => 'social@gmail.com',
                'password'=>Hash::make('social'),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Medecin générale',
                'email' => 'medecin@gmail.com',
                'password'=>Hash::make('medecin'),
                'created_at' => $now,
                'updated_at' => $now,
            ],




        ]);

    }
}
