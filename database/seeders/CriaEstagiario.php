<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CriaEstagiario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estagiarios')->insert(
            [
            'nascimento' => Date('31-05-2002'),
            'nome' => 'Ana Luiza',
            'cpf' => Str::random(11),
            'email' => Str::random(10).'@gmail.com',
            'telefone' => '61988771223',
            'faculdade' => 'UnB',
            'cnpj_faculdade' => '00038174000143',
            'curso' => 'Engenharia de Sistemas',
            'expectativa_formacao' => Date('31-12-2024'),
            'termo_assinado' => null,
            'inicio_contrato' => Date('01-01-2023'),
            'fim_contrato' => Date('31-12-2024'),
            ]);

        DB::table('estagiarios')->insert(
            [
            'nascimento' => Date('31-05-2002'),
            'nome' => 'Pablo',
            'cpf' => Str::random(11),
            'email' => Str::random(10).'@gmail.com',
            'telefone' => '61988771223',
            'faculdade' => 'UnB',
            'cnpj_faculdade' => '00038174000143',
            'curso' => 'Engenharia de Software',
            'expectativa_formacao' => Date('31-12-2024'),
            'termo_assinado' => null,
            'inicio_contrato' => Date('01-01-2023'),
            'fim_contrato' => Date('31-12-2024')]);
    }
}
