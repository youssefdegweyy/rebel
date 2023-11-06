<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities,name',
            'price' => 'required|numeric|gt:0',
        ]);

        if (City::create($request->all())) return redirect('admin/cities')->with('message', 'City created successfully.');
        else return redirect()->back()->with('error', 'Error creating city.');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('dashboard.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);

        if ($city->update($request->all())) return redirect('admin/cities')->with('message', 'City updated successfully.');
        else return redirect()->back()->with('error', 'Error updating city.');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        if ($city->delete()) return redirect()->back()->with('message', 'City deleted successfully.');
        else return redirect()->back()->with('error', 'Error deleting city.');
    }
}
