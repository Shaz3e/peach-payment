# Peach Payment Embed Checkout with Laravel

[![Total Downloads](http://poser.pugx.org/shaz3e/peach-payment/downloads)](https://packagist.org/packages/shaz3e/peach-payment)
[![Latest Stable Version](http://poser.pugx.org/shaz3e/peach-payment/v)](https://packagist.org/packages/shaz3e/peach-payment)
[![License](http://poser.pugx.org/shaz3e/peach-payment/license)](https://packagist.org/packages/shaz3e/peach-payment)


### Install Support Ticket
```bash
composer require shaz3e/peach-payment
```

### Add service provider
```bash
'providers' => [
    Shaz3e\PeachPayment\Providers\PeachPaymentServiceProvider::class,
]
```

### Publish the config file
```bash
php artisan vendor:publish --tag=peach-payment-config
```

### Update .env Data
```bash
php artisan update:peach-payment-config
```

### How to Use

```php
use Shaz3e\PeachPayment\Helpers\PeachPayment;

// Use the following code within your controller method
$entityId = config('peach-payment.entity_id'); // Update in .env
$amount = (float) $request->amount; // Dynamic amount should be float
$peachPayment = new  PeachPayment();
$checkoutData = $peachPayment->createCheckout($amount);
$order_number = $checkoutData['order_number']; // Optional
$checkoutId = $checkoutData['checkoutId'];
return  view('your.view', compact('entityId', 'checkoutId'));
```

In your.view use the following code.

```html
<div id="payment-form"></div>
<script src="{{ config('peach-payment.' . config('peach-payment.environment') . '.embedded_checkout_url') }}"></script>
<script>
    const checkout = Checkout.initiate({
        key: "{{ $entityId }}",
        checkoutId: "{{ $checkoutId }}",
    });

    checkout.render("#payment-form");
</script>
```

When you run ```php artisan update:peach-payment-config``` it will ask you the following.
1. What is your PEACHPAYMENT_ENVIRONMENT? 
2. What is your PEACHPAYMENT_ENTITY_ID? 
3. What is your PEACHPAYMENT_CLIENT_ID? 
4. What is your PEACHPAYMENT_CLIENT_SECRET? 
5. What is your PEACHPAYMENT_MERCHANT_ID? 
6. What is your PEACHPAYMENT_DOMAIN?
7. What is your PEACHPAYMENT_CURRENCY? 

After updating env data visit ```yourwebsite.com/peachpayment``` and it will fatch token and initiate the checkout at [PeachPayment](https://peachpayments.com)

Test Credit Cards [https://developer.peachpayments.com/docs/reference-test-and-go-live](https://developer.peachpayments.com/docs/reference-test-and-go-live)

#### Contributing

* If you have any suggestions please let me know : https://github.com/Shaz3e/peach-payment/pulls.
* Please help me improve code https://github.com/Shaz3e/peach-payment/pulls

#### License
Peach Payment Embed Checkout with Laravel is licensed under the MIT license. Enjoy!

## Credit
* [Shaz3e](https://www.shaz3e.com) | [YouTube](https://www.youtube.com/@shaz3e) | [Facebook](https://www.facebook.com/shaz3e) | [Twitter](https://twitter.com/shaz3e) | [Instagram](https://www.instagram.com/shaz3e) | [LinkedIn](https://www.linkedin.com/in/shaz3e/)
* [Diligent Creators](https://www.diligentcreators.com) | [Facebook](https://www.facebook.com/diligentcreators) | [Instagram](https://www.instagram.com/diligentcreators/) | [Twitter](https://twitter.com/diligentcreator) | [LinkedIn](https://www.linkedin.com/company/diligentcreators/) | [Pinterest](https://www.pinterest.com/DiligentCreators/) | [YouTube](https://www.youtube.com/@diligentcreator) [TikTok](https://www.tiktok.com/@diligentcreators) | [Google Map](https://g.page/diligentcreators)