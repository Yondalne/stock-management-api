<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::all();
        return response()->json($providers, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:providers|max:255',
                'contact' => 'required|string|max:255',
                'resources'=> ''
            ]);

            $provider = Provider::create($validatedData);
            $provider->resources()->attach($validatedData['resources']);
            return response()->json($provider, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        $provider->load('resources'); // Charger les ressources liées
        return response()->json($provider, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        try {
            $validatedData = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:providers,email,' . $provider->id . '|max:255',
                'contact' => 'required|string|max:255',
                'resources' => ''
            ]);

            $provider->update($validatedData);
            $provider->resources()->detach();
            $provider->resources()->attach($validatedData['resources']);

            return response()->json($provider, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return response()->json(null, 204);
    }
}
