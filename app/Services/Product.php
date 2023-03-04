<?php

namespace App\Services;

class Product
{
    public $code;
    public $name;
    public $price;

    public function __construct($product = [])
    {
        foreach ($product as $property => $value) {
            if (isset($this->{$property})) {
                $this->{$property} = $value;
            }
        }
    }

    public static function all()
    {
        $products = [
            [
                'code' => 'FR1',
                'name' => 'Fruit tea',
                'price' => 3.11,
            ],
            [
                'code' => 'SR1',
                'name' => 'Strawberries',
                'price' => 5.00,
            ],
            [
                'code' => 'CF1',
                'name' => 'Coffee',
                'price' => 11.23,
            ]
        ];

        return collect($products); 
    }
    
}