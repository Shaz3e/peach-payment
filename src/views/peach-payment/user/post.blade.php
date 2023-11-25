<div id="payment-form"></div>
<script src="{{ config('peach-payment.' . config('peach-payment.environment') . '.embedded_checkout_url') }}"></script>
<script>
    const checkout = Checkout.initiate({
        key: "{{ $entityId }}",
        checkoutId: "{{ $checkoutId }}",
    });

    checkout.render("#payment-form");
</script>