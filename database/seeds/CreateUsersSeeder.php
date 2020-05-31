<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@baresbin.com',
                'username' => 'admin',
                'jenis'    => 'admin',
                'status'   => 'aktif',
                'password' => Hash::make('baresbin')]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
