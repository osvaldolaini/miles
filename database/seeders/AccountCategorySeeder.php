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
                    'title'     => 'TUDO AZUL',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'SMILES',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM BR',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM USA',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM ARG',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'LATAM WALLET',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'IBERIA',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'AMERICA AIRLINES',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'VOUCHER TAP',
                    'code'      => Str::uuid(),
                ],
                [
                    'active'    => '1',
                    'title'     => 'VOUCHER AZUL',
                    'code'      => Str::uuid(),
                ]

            ]
        );
    }
}
