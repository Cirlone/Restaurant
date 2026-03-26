<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view for the authenticated user.
     */
    public function index()
    {
        // You can pass user data to the view if needed
        $user = Auth::user();

        // Example: you could also pass dynamic data like orders, stats, etc.
        // $orders = Order::where('user_id', $user->id)->latest()->take(5)->get();

        return view('dashboard', compact('user'));
    }
}