<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currency_values')->insert([
            'currency_id' => '1',
            'currency_value' => 26.9502,
            'logged_at' => (new \DateTimeImmutable('now', new \DateTimeZone('Europe/Istanbul')))
                ->sub( new \DateInterval('P1D'))
                ->format(DATE_ATOM),
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);


        DB::table('currency_values')->insert([
            'currency_id' => '2',
            'currency_value' => 29.6118,
            'logged_at' => (new \DateTimeImmutable('now', new \DateTimeZone('Europe/Istanbul')))
                ->sub( new \DateInterval('P1D'))
                ->format(DATE_ATOM),
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);

        DB::table('currency_values')->insert([
            'currency_id' => '1',
            'currency_value' => 26.9325,
            'logged_at' => (new \DateTimeImmutable(
                'now',
                new \DateTimeZone('Europe/Istanbul')
            ))->format(DATE_ATOM),
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);


        DB::table('currency_values')->insert([
            'currency_id' => '2',
            'currency_value' => 29.6762,
            'logged_at' => (new \DateTimeImmutable('now', new \DateTimeZone('Europe/Istanbul')))
                ->format(DATE_ATOM),
            'created_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
            'updated_at' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);


    }
}











