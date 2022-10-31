<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Jerry Andrianto Pangaribuan',
                'username' => 'jerry2204',
                'email' => 'jerryandrianto22@gmail.com',
                'dashboard_link' => '',
                'password' => Hash::make('jerry123'),
                'role_id' => 1,
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Ricky Alfrido Pangaribuan',
                'username' => 'ricky1304',
                'email' => 'sipil16ricky@gmail.com',
                'dashboard_link' => 'https://app.powerbi.com/reportEmbed?reportId=938985ee-8a47-43ef-9a43-9ecbccb6d727&autoAuth=true&ctid=da5fec72-8d71-407a-b49a-16212f2ea986',
                'password' => Hash::make('ricky123'),
                'role_id' => 2,
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        ]);
    }
}
