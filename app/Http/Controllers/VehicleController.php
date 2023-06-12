<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }
    public function login()
    {
        return view('vehicles.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = Vehicle::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Vehicle::login($user);

        return redirect('/dashboard');
    }

    public function create()
    {
        return view('vehicles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Vehicle created successfully.');
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }



    public function destroy($id)
    {
        Vehicle::destroy($id);
        return redirect()->route('dashboard')->with('success', 'Vehicle deleted successfully.');
    }

    public function logiut($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.logout', compact('vehicle'));
    }

    public function logout(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard');
    }
}