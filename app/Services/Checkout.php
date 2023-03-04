<?php

namespace App\Services;

class Checkout
{
    public $carts = [];
    public $total = 0;

    public function __construct($pricing_rules = null, $carts = null)
    {
        $this->pricing_rules = $pricing_rules;
        $this->carts = $carts ?? [];
        $this->total = $this->getTotal();
    }

    public function scan($item)
    {
        $product = Product::all()->where('code', $item)->first();
        
        if (!is_null($product)) {
            $this->carts[$item] = 1 + ($this->carts[$item] ?? 0);
            $this->total = $this->getTotal();
        }
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->carts as $item => $quantity) {
            $product = Product::all()->where('code', $item)->first();

            // Pricing Rules
            if (isset($this->pricing_rules[$item])) {
                foreach ($this->pricing_rules[$item] as $rule => $options) {
                    $total += $this->{$rule}($product, $quantity, $options);
                }
            } else {
                $total += $quantity * $product['price'];
            }
        }
        return $total;
    }

    private function buy_1_get_1($product, $quantity, $options)
    {
        $quantity =  floor($quantity / 2) + $quantity % 2;
        return $quantity * $product['price'];
    }

    private function discount_min($product, $quantity, $options)
    {
        $price = $product['price'];
        if ($quantity >= $options['min']) {
            $price = $options['price'];
        }
        return $quantity * $price;
    }
}