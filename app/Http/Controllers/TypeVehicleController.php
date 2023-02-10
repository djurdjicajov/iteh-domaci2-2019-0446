<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleCollection;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TypeVehicleController extends Controller
{
    public function index($TypeID)
    {
        $vehicles = Vehicle::get()->where('type_id', $TypeID);
        if(is_null($vehicles)) {
            return response()->json('Data not found', 404);
        }
        return new VehicleCollection($vehicles);
    }
}
