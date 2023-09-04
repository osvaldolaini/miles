<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_categories')->insert(
            [
                [
                    'active'    => '1',
                    'title'     => 'AMERICA AIRLINES',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'AZUL INTERLINES',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'AZUL VIAGENS',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'COPA AIRLINES',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'IBERIA AVIOS',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM ARG',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM BR',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM US',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'SMILES',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'TAP AIR',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'TUDO AZUL',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'TUDO AZUL DIAMENTE',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'TUDO AZUL LIMINAR',
                    'code'      => Str::uuid(),
                ],
            ]
        );
    }
}
