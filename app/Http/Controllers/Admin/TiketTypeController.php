<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TiketType;

class TiketTypeController extends Controller
{
    public function index()
    {
        $ticketTypes = TiketType::all();
        return view('admin.ticket_types.index', compact('ticketTypes'));
    }

    public function create() {}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TiketType::create($validatedData);
        return redirect()->route('admin.ticket_types.index')->with('success', 'Ticket type added successfully.');
    }

    public function show($id)
    {
        //    $ticketType = TiketType::findOrFail($id);
        //    return view('admin.tickets.show', compact('ticketType'));
    }

    public function edit($id)
    {
        // $payment = Payment::findOrFail($id);
        // return view('admin.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ticketType = TiketType::findOrFail($id);
        $ticketType->update($validatedData);

        return redirect()->route('admin.ticket_types.index')->with('success', 'Ticket type updated successfully.');
    }

    public function destroy($id)
    {
        $ticketType = TiketType::findOrFail($id);
        $ticketType->delete();

        return redirect()->route('admin.ticket_types.index')->with('success', 'Ticket type deleted successfully.');
    }
}
