# Peach Payment Embed Checkout with Laravel

[![Total Downloads](http://poser.pugx.org/shaz3e/peach-payment/downloads)](https://packagist.org/packages/shaz3e/peach-payment)
[![Latest Stable Version](http://poser.pugx.org/shaz3e/peach-payment/v)](https://packagist.org/packages/shaz3e/peach-payment)
[![License](http://poser.pugx.org/shaz3e/peach-payment/license)](https://packagist.org/packages/shaz3e/peach-payment)


### Install Peach Payment in Laravel
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

Watch YouTube Video Tutorials with details instructions and customization
<iframe width="560" height="315" src="https://www.youtube.com/embed/Gw1Xw5ED5YA?si=9pIymaUZRI8pvmWg&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

```php
use Shaz3e\PeachPayment\Helpers\PeachPayment;

// Use the following code within your controller method
/**
 * Update in .env previously and get it from config
 */
$entityId = config('peach-payment.entity_id');
/**
 * Dynamic amount should be float
 * It can be passed via request
 */
$amount = (float) $request->amount;
/**
 * Return URL is optional
 * If you want user to redirect to another URL of your approved domain you can use the following
 * Do not use / at the beginnig of the $return_url as it will generate URL i.e. config('peach-payment.domain').'/'.$return_url.'/?PeachPaymentOrder='.$order_number
 */
$return_url = 'after-main-domain/route/sub-route/?PeachPaymentOrder=OID123456789'; // Optional

/**
 * Create new request for PeachPayment helper
 */
$peachPayment = new  PeachPayment();
/**
 * Generate token and initiate the request
 */
$checkoutData = $peachPayment->createCheckout($amount);
/**
 * Optional
 * Get Order Number if you want to update record in database
 * suggest me this is just for reconcile purpose
 * $checkoutData['order_number'] = OID.time()
 */
$order_number = $checkoutData['order_number'];
/**
 * CheckoutId is unique id generated by PeachPayment
 * This should be passed to render the form in blade template
 */
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
