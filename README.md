
# test_chechkout - TDD

Laravel Testing for checkout system from [Laravel Daily](https://www.youtube.com/watch?v=5XywKLjCD3g)'s video.
Implement Checkout System with pricing rules (buy 1 get 1 & discount).


## PHPUnit

PHPUnit Test Case
<br /> 1 FR1, SR1, FR1, FR1, CF1
<br />   &nbsp;&nbsp; = 22.45
<br /> 2 FR1, FR1
<br />   &nbsp;&nbsp; = 3.11
<br /> 3 SR1, SR1, FR1, SR1
<br />   &nbsp;&nbsp; = 16.61

PHPUnit result
<br /> PASS  Tests\Feature\CheckoutTest
<br /> ✓ checkout 1
<br /> ✓ checkout 2
<br /> ✓ checkout 3

 Tests:    3 passed (3 assertions)


## View
 
 Access checkout system from view. http://localhost:8000/products


## 🚀 Ship test_checkout

test_checkout require PHP >= 8.1.

Simply you can clone this repository:

```bash
git clone https://github.com/vantanto/test_checkout.git
cd test_checkout
```

Install dependencies using composer

```bash
composer install
```

Start local developement

```bash
php artisan serve
```
You can now access the server at http://localhost:8000

Run phpunit testing

```bash
php artisan test
```

## 📝 Credit

#### Special Thanks
- [Laravel](https://laravel.com/)
- [Laravel Daily](https://www.youtube.com/@LaravelDaily)
