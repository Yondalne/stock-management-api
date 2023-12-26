<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::all();
        return response()->json($operations, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validate($request, [
                'label' => 'required|string|max:255',
                'resources' => 'required|array',
                'resources.*.resource_id' => 'required|exists:resources,id',
                'resources.*.used_qty' => 'required|numeric|min:0',
            ]);

            $operation = Operation::create($validatedData);

            $operation->resources()->attach($validatedData['resources']);

            return response()->json($operation, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Operation $operation)
    {
        $operation->load('resources'); // Charger les ressources liées
        return response()->json($operation, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operation $operation)
    {
        try {
            $validatedData = $this->validate($request, [ 
                'label' => 'required|string|max:255',
            ]);

            $operation->update($validatedData);

            return response()->json($operation, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        $operation->resources()->detach();

        $operation->delete();

        return response()->json(null, 204);
    }
}
