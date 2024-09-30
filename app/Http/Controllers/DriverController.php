<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Driver/Index', [
            'drivers' => Driver::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Driver/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request): RedirectResponse
    {
        // Create a new driver with validated data, including the hashed password
        Driver::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver created successfully!');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->get('search');

        // Assuming you want to search based on the driver's name
        $drivers = Driver::where('first_name', 'like', "%{$searchTerm}%")
            ->orWhere('last_name', 'like', "%{$searchTerm}%")
            ->get(['id', 'first_name', 'last_name']);

        return response()->json($drivers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        return Inertia::render('Driver/Show', [
            'driver' => $driver,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return Inertia::render('Driver/Edit', [
            'driver' => $driver,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver): RedirectResponse
    {
        // Update the driver with validated data, excluding password if not present
        $driver->fill($request->except('password'));

        // If the email is changed, reset email verification
        if ($driver->isDirty('email')) {
            $driver->email_verified_at = null;
        }

        // If password is provided, hash it and update
        if ($request->filled('password')) {
            $driver->password = Hash::make($request->password);
        }

        // Save the updated driver
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver): RedirectResponse
    {
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully!');
    }
}
