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
            'currency_code' => 'USD',
            'long_name' => 'Amerikan Doları',
            'symbol' => '$',
            'created_by' => 1,
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);

        DB::table('currencies')->insert([
            'currency_code' => 'EUR',
            'long_name' => 'Euro',
            'symbol' => '€',
            'created_by' => 1,
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);
    }
}
