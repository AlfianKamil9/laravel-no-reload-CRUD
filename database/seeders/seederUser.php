<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class seederUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'Angga Bayu',
                'PASSWORDNYAANGGA',
                'Angga@gmail.com',
            ],
            [
                'Bayu Jaya',
                'PASSWORDNYABAYU',
                'Bayu@gmail.com',
            ],
            [
                'Cahya Bayu',
                'PASSWORDNYACAHYA',
                'Cahya@gmail.com',
            ],
        ];

        for ($i=0; $i < 3 ; $i++) { 
            User::create([
                'name' => $data[$i][0],
                'email' => $data[$i][2],
                'password' => $data[$i][1]
            ]);
        }
    }
}
