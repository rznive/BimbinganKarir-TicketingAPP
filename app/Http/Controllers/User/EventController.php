<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Payment;
class EventController extends Controller
{
    public function show(Event $event)
    {
        $paymentTypes = Payment::all();
        $event->load(['tikets', 'kategori', 'user']);

        return view('events.show', compact('event', 'paymentTypes'));
    }
}
