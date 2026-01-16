<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;


class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $totalEvents = Event::count();
        $totalCategories = \App\Models\Kategori::count();
        $totalOrders = Order::count();
        return view('admin.dashboard', compact('totalEvents', 'totalCategories', 'totalOrders'));
    }
}
