<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Models\Driver;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::with('driver')->get();
        return Inertia::render('Route/Index', [
            'routes' => $routes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Driver::all(); // Fetch all drivers to assign to a route
        return Inertia::render('Route/Create', [
            'drivers' => $drivers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteRequest $request): RedirectResponse
    {
        Route::create($request->validated());

        return redirect()->route('routes.index')->with('success', 'Route created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        return Inertia::render('Route/Show', [
            'route' => $route->load('driver')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        $drivers = Driver::all();
        return Inertia::render('Route/Edit', [
            'route' => $route,
            'drivers' => $drivers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteRequest $request, Route $route): RedirectResponse
    {
        $route->update($request->validated());

        return redirect()->route('routes.index')->with('success', 'Route updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route): RedirectResponse
    {
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Route deleted successfully!');
    }
}
