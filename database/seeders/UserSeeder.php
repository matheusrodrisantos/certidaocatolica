<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
[           
            [
                "id"=>1,
                "name"=>"Matheus Rodrigues",
                "email"=> "matheus.rodrisantos@outlook.com",
                "password"=> Hash::make('123mudar'),
                "paroquia_id"=>null
            ],
            [
                "id"=>2,
                "name"=>"Secretario 1",
                "email"=> "nsrosario@arqaparecida.org.br",
                "password"=> Hash::make('123mudar'),
                "paroquia_id"=>1
            ],
            [
                "id"=>3,
                "name"=>"Secretario 2",
                "email"=> "secretario@diocesedejanuaria.com.br",
                "password"=> Hash::make('123mudar'),
                "paroquia_id"=>2
            ],
            [
                "id"=>4,
                "name"=>"Rafael",
                "email"=> "rafael@certidaocatolica.com.br",
                "password"=> Hash::make('123mudar'),
                "paroquia_id"=>null
            ],
            [
                "id"=>5,
                "name"=>"Matheus Rodrigues",
                "email"=> "matheus@certidaocatolica.com.br",
                "password"=> Hash::make('123mudar'),
                "paroquia_id"=>null
            ]
        ]
        );
    }
}
