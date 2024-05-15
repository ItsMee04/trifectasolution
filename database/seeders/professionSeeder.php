<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class professionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profession::create([
            'profession'    => 'ADMIN',
            'status'        => 1,
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);
    }
}
