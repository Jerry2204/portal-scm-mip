<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'nama_role' => 'admin',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'nama_role' => 'user',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ]);
    }
}
