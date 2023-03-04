<?php

namespace Tests\Feature;

use App\Services\Checkout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    public $pricing_rules = [
        'FR1' => [
            'buy_1_get_1' => []
        ],
        'SR1' => [
            'discount_min' => ['min' => 3, 'price' => 4.50]
        ]
    ];

    private function checkOutTotalTest($items) {
        $co = new Checkout($this->pricing_rules);
        foreach ($items as $item) {
            $co->scan($item);
        }
        return $co->total;
    }

    public function test_checkout_1(): void
    {
        $items = ['FR1', 'SR1', 'FR1', 'FR1', 'CF1'];
        $this->assertEquals(22.45, $this->checkOutTotalTest($items));
    }

    public function test_checkout_2(): void
    {
        $items = ['FR1', 'FR1'];
        $this->assertEquals(3.11, $this->checkOutTotalTest($items));
    }
    
    public function test_checkout_3(): void
    {
        $items = ['SR1', 'SR1', 'FR1', 'SR1'];
        $this->assertEquals(16.61, $this->checkOutTotalTest($items));
    }
}
