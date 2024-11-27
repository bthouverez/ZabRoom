<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Transport;
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

        User::factory()->create([
            'name' => 'Bthouverez',
            'email' => 'bthouverez@bthouverez.fr',
            'password' => Hash::make('321654'),
            'is_admin' => 1,
        ]);

        User::factory()->create([
            'name' => 'God',
            'email' => 'admin@example.com',
            'is_admin' => 1,
        ]);

        Classroom::factory(5)->create();
        Transport::factory(5)->create();

        $c = new Classroom;
        $c->label = "SIO2";
        $c->letter = 'A';
        $c->user_id = 1;
        $c->save();

        User::factory(5)->create([
           'classroom_id' => $c->id,
        ]);

    }
}
