<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Appointment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('appointment.service')->latest()->get();

        return view('payments.index', [
            'items'=> $payments
        ]);
    }

    public function pay($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 'paid']);

        return redirect('/payments');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect('/payments');
    }
}