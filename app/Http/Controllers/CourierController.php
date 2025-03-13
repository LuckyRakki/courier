<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index() {
        $couriers = Courier::all();
        return response()->json([
            'status' => 200,
            'message' => 'Courier retrieved succesfully',
            'data' => $couriers,
        ], 200);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        $couriers = Courier::create($request->all());
        
        return response()->json([
            'status' => 201,
            'message' => 'Courier created succesfully.',
            'data' => $couriers
        ], 201);
    }

    public function show($id) {
        $couriers = Courier::find($id);

    if (!$couriers) {
        return response()->json([
            'status' => 404,
            'message' => 'Courier not found.',
            'data' => null,
        ], 404);
    }

    return response()->json([
        'status' => 200,
        'message' => 'Courier retrieved successfully.',
        'data' => $couriers,
    ], 200);
    }

    public function update(Request $request, $id) {
        $couriers = Courier::find($id);

        if (!$couriers) {
            return response()->json([
                'status' => 404,
                'message' => 'Courier not found.',
                'data' => null
            ], 404);
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);
        $couriers->update($request->all());
    
        return response()->json([
            'status' => 200,
            'message' => 'Courier updated successfully.',
            'data' => $couriers
        ], 200);
    }

    public function destroy($id) {
        $couriers = Courier::find($id);

        if (!$couriers) {
            return response()->json([
                'status' => 404,
                'message' => 'Courier not found.',
                'data' => null
            ], 404);
        }
    
        $couriers->delete();
    
        return response()->json([
            'status' => 200,
            'message' => 'Courier deleted successfully.',
            'data' => null
        ], 200);
    }
}