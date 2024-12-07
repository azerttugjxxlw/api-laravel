<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Myclient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MyclientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $myclients = Myclient::all();
        return response()->json($myclients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $validator = Validator::make($request->all(), [
            'CodeClient' => 'required|string|max:255',
            'Rais_Soc' => 'required|string|max:255',
            'CintactClient' => 'required|string|max:255',
            'AdrClient' => 'required|string|max:255',
            'DateEnreg' => 'required|date',
            'TitreRep' => 'required|string|max:255',
            'NomRep' => 'required|string|max:255',
            'ContactRep' => 'required|string|max:255',
            'PrixClient' => 'required|string|max:255',
        ]);

        if ($validator->passes()) {
            $myclients = new Myclient();

            $myclients->CodeClient = $request->CodeClient;
            $myclients->Rais_Soc = $request->Rais_Soc;
            $myclients->CintactClient = $request->CintactClient;
            $myclients->AdrClient = $request->AdrClient;
            $myclients->TitreRep = $request->TitreRep;
            $myclients->NomRep = $request->NomRep;
            $myclients->ContactRep = $request->ContactRep;
            $myclients->PrixClient = $request->PrixClient;
            $myclients->DateEnreg = Carbon::parse($request->DateEnreg);
            $myclients->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $myclients
            );
        } else {
            return response()->json(array("success" => false, "type" => 'validation', 'errors' => $validator->messages()))
                ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY, Response::$statusTexts[Response::HTTP_UNPROCESSABLE_ENTITY]);
        }
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myclients = Myclient::where('CodeClient', $id)->first();
        $data = array(
            "success" => true,
            "data" => $myclients
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $myclients = Myclient::where('CodeClient', $id)->first();
        $validator = Validator::make($request->all(), [
            'CodeClient' => 'required',
            'Rais_Soc' => 'required',
            'CintactClient' => 'required',
            'AdrClient' => 'required',
            'DateEnreg' => 'required',
            'TitreRep' => 'required',
            'NomRep' => 'required',
            'ContactRep' => 'required',
            'PrixClient' => 'required',
        ]);

        if ($validator->passes()) {

            $myclients->CodeClient = $request->CodeClient;
            $myclients->Rais_Soc = $request->Rais_Soc;
            $myclients->CintactClient = $request->CintactClient;
            $myclients->AdrClient = $request->AdrClient;
            $myclients->TitreRep = $request->TitreRep;
            $myclients->NomRep = $request->NomRep;
            $myclients->ContactRep = $request->ContactRep;
            $myclients->PrixClient = $request->PrixClient;
            $myclients->DateEnreg = Carbon::parse($request->DateEnreg);
            $myclients->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $myclients
            );
        } else {
            return response()->json(array("success" => false, "type" => 'validation', 'errors' => $validator->messages()))
                ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY, Response::$statusTexts[Response::HTTP_UNPROCESSABLE_ENTITY]);
        }
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Myclient::where('CodeClient', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

