<?php

namespace Tests\Unit\Http\Controllers\CurrencyCalculation;

use Tests\TestCase;
use App\Services\CurrencyCalculation\CurrencyCalculationGetter;
use Database\Factories\CurrencyFactory;
use Database\Factories\CurrencyValueFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CurrencyCalculationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCalculateCurrencyByCodeAndAmount()
    {
        $user = UserFactory::new()->create();
        $currencyVal = 28.25;
        $amount= 10;
        $calculatedValue = $currencyVal * $amount;

        $token = auth()->login($user);

        $currency = CurrencyFactory::new()->create([
            'currency_code' => 'USD',
            'created_by' => $user->id
        ]);

        $currencyValue = CurrencyValueFactory::new()->create([
            'currency_id' => $currency->id,
            'currency_value' => $currencyVal,
        ]);

        $currencyCalculationGetter = $this->getMockBuilder(CurrencyCalculationGetter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $currencyCalculationGetter->expects($this->once())
            ->method('calculateCurrencyByCodeAndAmount')
            ->willReturn([
                'amount' => 10,
                'currency_value' => $currencyVal,
                'calculated_value' => $calculatedValue,
                'symbol' => $currency->symbol,
                'last_logged_at' => $currencyValue->logged_at,
            ]);

        $this->app->instance(CurrencyCalculationGetter::class, $currencyCalculationGetter);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
        ->get('/api/calculate_currency?amount=10&currency_code=USD');

        $response->assertStatus(200);

        $jsonData = $response->json();

        $this->assertEquals($currencyVal, $jsonData['data']['currency_value']);
        $this->assertEquals($calculatedValue, $jsonData['data']['calculated_value']);
    }
}
