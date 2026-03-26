<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
        public function index()
    {
        // You can pass user data to the view if needed
        $user = Auth::user();

        // Example: you could also pass dynamic data like orders, stats, etc.
        // $orders = Order::where('user_id', $user->id)->latest()->take(5)->get();

        return view('password-reset', compact('user'));
    }
}
