# Peach Payment Hosted Checkout with Laravel


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