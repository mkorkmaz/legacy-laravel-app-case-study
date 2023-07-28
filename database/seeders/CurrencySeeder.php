<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            'id' => '11540e34-4cd1-448e-af98-a1b14a5abd44',
            'currencyCode' => 'USD',
            'long_name' => 'Amerikan Doları',
            'symbol' => '$',
            'created_by' => 1,
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);

        DB::table('currencies')->insert([
            'id' => 'c961cb13-4d6f-44b1-9c41-c1115359daaa',
            'currencyCode' => 'EUR',
            'long_name' => 'Euro',
            'symbol' => '€',
            'created_by' => 1,
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);
    }
}
