<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParoquiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paroquias')->insert(
            [
                [
                    'id'=>'1',
                    'nome'=>'PARÓQUIA N. SRA. DO ROSÁRIO',
                    'cep'=>'12523520',
                    'endereco'=>'Rua Niterói, 350, Jardim Vista Alegre, Guaratinguetá SP',
                    'numero'=>'350'
                ],
                [
                    'id'=>'2',
                    'nome'=>'PARÓQUIA Nossa Senhora das Dores',
                    'cep'=>'39482000',
                    'endereco'=>'Praça Dom Daniel, 112, Centro, Januária – MG',
                    'numero'=>'350'
                ]
        ]);
    }
}
