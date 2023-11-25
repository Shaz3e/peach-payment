<div id="payment-form"></div>
<script src="https://sandbox-checkout.peachpayments.com/js/checkout.js"></script>
<script>
    const checkout = Checkout.initiate({
        key: "{{ $entityId }}",
        checkoutId: "{{ $checkoutId }}",
    });

    checkout.render("#payment-form");
</script>