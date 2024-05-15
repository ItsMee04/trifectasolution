<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'username'  =>  'indrakusuma',
            'password'  =>  Hash::make('123'),
            'employee_id'   =>  1,
            'role_id'       =>  1,
            'status'        => 1,
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);
    }
}
