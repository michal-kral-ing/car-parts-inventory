<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index($car = null)
    {
        $car = Car::find($car);
        $parts = $car
            ? Part::where('car_id', $car->id)->with('car')->get()
            : Part::with('car')->get();
        return view('part.index', compact('parts', 'car'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('part.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'serial_number' => 'required|unique:parts',
            'car_id' => 'required|exists:cars,id',
        ]);

        $part = new Part();
        $part->name = $request->name;
        $part->serial_number = $request->serial_number;
        $part->car_id = $request->car_id;
        $part->save();

        return redirect()->route('parts')->with('success', 'Part created successfully');
    }

    public function edit(Part $part)
    {
        $cars = Car::all();
        return view('part.edit', compact('part', 'cars'));
    }

    public function update(Request $request, Part $part)
    {
        $part->update($request->all());
        return redirect()->route('parts')->with('success', 'Part updated successfully');
    }

    public function destroy(Part $part)
    {
        $part->delete();
        return redirect()->route('parts')->with('success', 'Part deleted successfully');
    }
}
