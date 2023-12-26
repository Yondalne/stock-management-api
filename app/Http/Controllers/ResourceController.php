<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::with(['providers', 'categories'])->get();
        return response()->json($resources, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validate($request, [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|numeric|min:0',
                'categories' => ''
            ]);

            $resource = Resource::create($validatedData);
            $resource->categories()->attach($validatedData['categories']);

            return response()->json($resource, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        $resource->load('providers', 'categories'); // Charger les fournisseurs et catégories liés
        return response()->json($resource, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        try {
            $validatedData = $this->validate($request, [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|numeric|min:0',
                'categories' => ''
            ]);

            $resource->update($validatedData);
            $resource->categories()->detach();
            $resource->categories()->attach($validatedData['categories']);

            return response()->json($resource, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return response()->json(null, 204);
    }
}
