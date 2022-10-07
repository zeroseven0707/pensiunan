<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pensiunan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         Pensiunan::create([
            'nama'=>'Sihab',
            'no_pensiunan'=>983,
            'alamat'=>'sangali pasirsalam',
            'no_telp'=>'087648927363',
        ]);
    }
}
