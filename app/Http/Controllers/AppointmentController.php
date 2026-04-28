<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Service;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('service')->oldest()->get();

        return view('appointments.index', [
            'items'=> $appointments
        ]);
    }

    public function create()
    {
        $services = Service::all();

        return view('appointments.create', [
            'services'=> $services
        ]);
    }

    public function store(Request $request)
    {
        // 1. Create the appointment
        $appointment = Appointment::create([
            'customer_name'=> $request->customer_name,
            'customer_contact'=> $request->customer_contact,
            'service_id'=> $request->service_id,
            'date'=> $request->date,
            'time'=> $request->time,
        ]);

        // 2. Create the payment using the price from the service
        Payment::create([
            'appointment_id' => $appointment->id,
            'amount'         => $appointment->service->price,
            'status'         => 'unpaid',
        ]);

        return redirect('/appointments');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $services = Service::all();

        return view('appointments.edit', [
            'item'=> $appointment,
            'services'=> $services
        ]);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'customer_name'=> $request->customer_name,
            'customer_contact'=> $request->customer_contact,
            'service_id'=> $request->service_id,
            'date'=> $request->date,
            'time'=> $request->time,
        ]);

        return redirect('/appointments');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect('/appointments');
    }
}