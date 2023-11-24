<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="payment-form"></div>
    <script src="https://sandbox-checkout.peachpayments.com/js/checkout.js"></script>
    <script>
        const checkout = Checkout.initiate({
            key: "{{ $entityId }}",
            checkoutId: "{{ $checkoutId }}",
        });

        checkout.render("#payment-form");
    </script>
</body>

</html>