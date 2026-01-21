<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index', compact('payments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Payment::create($validatedData);
        return redirect()->route('admin.payments.index')->with('success', 'Payment method added successfully.');
    }

    public function show($id)
    {
        // $payment = Payment::findOrFail($id);
        // return view('admin.payment.show', compact('payment'));
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

        $payment = Payment::findOrFail($id);
        $payment->update($validatedData);

        return redirect()->route('admin.payments.index')->with('success', 'Payment method updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments.index')->with('success', 'Payment method deleted successfully.');
    }
}
