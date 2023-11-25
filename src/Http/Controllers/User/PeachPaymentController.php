<?php

namespace Shaz3e\PeachPayment\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shaz3e\PeachPayment\Helpers\PeachPayment;

class PeachPaymentController extends Controller
{

    public function createTransaction()
    {
        return view('peach-payment::peach-payment.user.create');
    }

    public function postTransaction(Request $request)
    {
        $entityId = config('peach-payment.entity_id');

        try {
            $amount = (float) $request->amount;
    
            $peachPayment = new PeachPayment();
    
            // Create checkout using the helper
            $checkoutId = $peachPayment->createCheckout($amount);
    
            // Render the payment form
            return view('peach-payment::peach-payment.user.post', compact('entityId', 'checkoutId'));
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
