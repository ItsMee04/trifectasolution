<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name'          =>  'Indra Kusuma',
            'address'       =>  'Purwokerto',
            'phone'         =>  '081390469322',
            'avatar'        =>  'admin.png',
            'signature'     =>  'signature.png',
            'profession_id' =>  1,
            'status'        =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ]);
    }
}
