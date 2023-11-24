<?php

namespace Shaz3e\PeachPayment\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shaz3e\PeachPayment\Helpers\PeachPayment;

class PeachPaymentController extends Controller
{
    public function pay()
    {
        // $peachPayment = new PeachPayment();
        // $result = $peachPayment->createCheckout(10);
        // return $result;
        try {
            $entityId = config('peach-payment.entity_id');

            $peachPayment = new PeachPayment();
            // Create checkout using the helper
            $checkoutId = $peachPayment->createCheckout(5);

            // Render the payment form
            return view('peach-payment::peach-payment.user.index', compact('entityId', 'checkoutId'));

        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
