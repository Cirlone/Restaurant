<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        Stripe::setApiKey(config('cashier.secret'));

        // Build line items for Stripe
        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'ron',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    // Stripe uses smallest currency unit (bani)
                    'unit_amount' => (int) round($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Add delivery fee as a line item
        $lineItems[] = [
            'price_data' => [
                'currency' => 'ron',
                'product_data' => [
                    'name' => 'Delivery Fee',
                ],
                'unit_amount' => 1200, // 12 RON in bani
            ],
            'quantity' => 1,
        ];

        // Create Stripe Checkout Session
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
            'metadata' => [
                'user_id' => auth()->id(),
                'voucher_code' => session()->get('voucher_code', ''),
            ],
        ]);

        // Create pending order in DB
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $discount = session()->get('discount', 0);
        $discountAmount = $subtotal * ($discount / 100);
        $deliveryFee = 12;
        $total = $subtotal - $discountAmount + $deliveryFee;

        $order = Order::create([
            'user_id' => auth()->id(),
            'stripe_session_id' => $checkoutSession->id,
            'status' => 'pending',
            'subtotal' => $subtotal,
            'discount' => $discountAmount,
            'delivery_fee' => $deliveryFee,
            'total' => $total,
            'voucher_code' => session()->get('voucher_code'),
        ]);

        // Save order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Redirect to Stripe
        return redirect($checkoutSession->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if ($sessionId) {
            Stripe::setApiKey(config('cashier.secret'));
            $checkoutSession = Session::retrieve($sessionId);

            // Update order status to paid
            $order = Order::where('stripe_session_id', $sessionId)->first();

            if ($order) {
                $order->update([
                    'status' => 'paid',
                    'stripe_payment_intent_id' => $checkoutSession->payment_intent,
                ]);

                // Clear the cart
                session()->forget('cart');
                session()->forget('discount');
                session()->forget('voucher_code');
            }
        }

        return view('checkout.success', compact('order'));
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}