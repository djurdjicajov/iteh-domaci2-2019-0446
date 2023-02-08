<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeCollection;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    //GET
    //localhost:8000/api/ypes
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return TypeResource::collection(ype::all());
        return new TypeCollection(Type::all());
    }


    //POST
    //localhost:8000/api/Types
    //BODY = Type Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $Type = Type::create($input);
        return response()->json([
            "success" => true,
            "message" => "Type created successfully.",
            "data" => $Type
        ]);
    }

    //GET
    //localhost:8000/api/Types/{TypeID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $Type
     * @return \Illuminate\Http\Response
     */
    public function show($TypeID)
    {
        $Type = Type::find($TypeID);
        return is_null($Type) ? response()->json('Data not found', 404) : new TypeResource($Type);
    }


    //DELETE
    //localhost:8000/api/Types/{TypeID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $TypeID
     * @return \Illuminate\Http\Response
     */
    public function destroy($TypeID)
    {
        $Type = Type::where('id', $TypeID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Type deleted successfully.",
            "data" => $Type
        ]);
    }
}
