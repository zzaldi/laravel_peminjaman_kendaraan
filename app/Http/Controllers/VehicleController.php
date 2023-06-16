<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }
    public $email;
    public $password;
    protected $rules = [
        'password' => 'required',
        'email' => 'required|email',
    ];
    public function Login()
    {

        $this->login();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];
        if (Auth::attempt($credentials)) {
            session()->flash('message', 'Successfully login with your account!');
            return redirect(route("dashboard"));
        } else {
            session()->flash('error', 'Something wrong credentials!');
            return redirect(back());
        }
    }
    public function render()
    {
        return view('vehicles.login');
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
        $show = Vehicle::findOrFail($id);

        return view('vehicles.show', compact('vehicle'));
    }
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Update data kendaraan
        $vehicle->name = $validatedData['name'];
        $vehicle->brand = $validatedData['brand'];
        $vehicle->type = $validatedData['type'];
        $vehicle->type = $validatedData['price'];
        // Update atribut lain sesuai kebutuhan

        $vehicle->save();

        return redirect()->route('dashboard')->with('success', 'Kendaraan berhasil diperbarui');
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

    public function logt(Request $request)
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