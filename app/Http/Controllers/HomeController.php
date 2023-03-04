<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use App\Services\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $pricing_rules = [
        'FR1' => [
            'buy_1_get_1' => []
        ],
        'SR1' => [
            'discount_min' => ['min' => 3, 'price' => 4.50]
        ]
    ];

    public function index(Request $request)
    {
        if ($request->carts == 'clear') session()->forget('carts');
        $products = Product::all();
        $checkout = new Checkout($this->pricing_rules, session('carts'));
        return view('product.index', compact('products', 'checkout'));
    }

    public function store($code)
    {
        $co = new Checkout($this->pricing_rules, session('carts'));
        $co->scan($code);
        session(['carts' => $co->carts]);
        return redirect()->route('products.index');
    }
}
