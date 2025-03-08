<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index() {
        return response()->json(Courier::all());
    }

    public function store(Request $request) {
        $courier = Courier::create($request->all());
        return response()->json($courier, 201);
    }

    public function show($id) {
        return response()->json(Courier::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $courier = Courier::findOrFail($id);
        $courier->update($request->all());
        return response()->json($courier);
    }

    public function destroy($id) {
        Courier::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}