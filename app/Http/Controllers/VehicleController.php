<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    //GET
    //localhost:8000/api/vehicles
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return VehicleResource::collection(Vehicle::all());
        return new VehicleCollection(Vehicle::all());
    }

    //GET
    //localhost:8000/api/vehicles/{vehicleID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $vehicleID
     * @return \Illuminate\Http\Response
     */
    public function show($vehicleID)
    {
        $vehicle = Vehicle::find($vehicleID);
        return is_null($vehicle) ? response()->json('Data not found', 404) : new VehicleResource($vehicle);
    }


    //DELETE
    //localhost:8000/api/vehicles/{vehicleID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $vehicleID
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehicleID)
    {
        $vehicle = Vehicle::where('id', $vehicleID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Vehicle deleted successfully.",
            "data" => $vehicle
        ]);
    }
}
