<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lucas',
            'email' => 'lucasdh2003@gmail.com',
            'password' => 'Luc@$@dmin#111',
            'is_admin' => 1
        ]);

        for ($i = 1; $i <= 49; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => "password",
                'is_admin' => 0
                ]);
        }
    }
}
