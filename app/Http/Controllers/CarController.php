<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    private $customMessages = [
        'registration_number.required_if' => 'Registration number is required when car is registered.',
        'registration_number.unique' => 'This registration number is already taken.',
    ];

    public function index()
    {
        $cars = Car::all();
        return view('car.index', compact('cars'));
    }

    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'registration_number' => 'exclude_if:is_registered,0|required_if:is_registered,1|unique:cars|min:3|max:10',
            'is_registered' => 'required|boolean',
        ], $this->customMessages);

        $car = new Car();
        $car->name = $request->name;
        $car->registration_number = $request->registration_number;
        $car->is_registered = $request->registration_number ? $request->is_registered : false;
        $car->save();

        return redirect()->route('cars')->with('success', 'Car created successfully');
    }

    public function edit(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'registration_number' => 'exclude_if:is_registered,0|required_if:is_registered,1|unique:cars,registration_number,' . $car->id . '|min:3|max:10',
            'is_registered' => 'required|boolean',
        ], $this->customMessages);

        $car->name = $request->name;
        $car->registration_number = $request->registration_number;
        $car->is_registered = $request->is_registered;
        $car->save();

        return redirect()->route('cars')->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars')->with('success', 'Car deleted successfully');
    }
}
