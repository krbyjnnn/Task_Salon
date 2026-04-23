<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services.index', [
            'items' => $services
        ]);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect('/services');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('services.edit', [
            'item' => $service
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect('/services');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect('/services');
    }
}