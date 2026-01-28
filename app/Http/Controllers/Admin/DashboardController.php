<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\Lokasi;
use App\Models\Payment;
use App\Models\TiketType;

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
        $totalLokasi = Lokasi::count();
        $totalmetodePembayaran = Payment::count();
        $totalTipeTiket = TiketType::count();
        return view('admin.dashboard', compact('totalEvents', 'totalCategories', 'totalOrders', 'totalLokasi', 'totalmetodePembayaran', 'totalTipeTiket'));
    }
}
