<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mypanier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MypanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mypanier = Mypanier::all();
        $data = array(
            "success" => true,
            "data" => $mypanier
        );
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $validator = Validator::make($request->all(), [
'idPanier' => 'required|string',
'Client' => 'required|string|max:255',
'NomProduit' => 'required|string|max:255',
'CategProd' => 'required|string|max:255',
'PrixUnitaire' => 'required|numeric',
'QteProduit' => 'required|integer',
'PrixTotal' => 'required|numeric',
'Date' => 'required|date',
        ]);

        if ($validator->passes()) {
            $mypanier = new Mypanier();

            $mypanier->idPanier = $request->idPanier;
            $mypanier->Client = $request->Client;
            $mypanier->NomProduit = $request->NomProduit;
            $mypanier->CategProd = $request->CategProd;
            $mypanier->PrixUnitaire = $request->PrixUnitaire;
            $mypanier->QteProduit = $request->QteProduit;
            $mypanier->PrixTotal = $request->PrixTotal;
            $mypanier->Date = Carbon::parse($request->Date);
            $mypanier->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $mypanier
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
        $mypanier = Mypanier::where('idPanier', $id)->first();
        $data = array(
            "success" => true,
            "data" => $mypanier
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $mypanier = Mypanier::where('idPanier', $id)->first();
        $validator = Validator::make($request->all(), [
'idPanier' => 'required',
'Client' => 'required',
'NomProduit' => 'required',
'CategProd' => 'required',
'PrixUnitaire' => 'required|numeric',
'QteProduit' => 'required|numeric',
'PrixTotal' => 'required|numeric',
'Date' => 'required|date',

        ]);

        if ($validator->passes()) {

            $mypanier->idPanier = $request->idPanier;
            $mypanier->Client = $request->Client;
            $mypanier->NomProduit = $request->NomProduit;
            $mypanier->CategProd = $request->CategProd;
            $mypanier->PrixUnitaire = $request->PrixUnitaire;
            $mypanier->QteProduit = $request->QteProduit;
            $mypanier->PrixTotal = $request->PrixTotal;
            $mypanier->Date = Carbon::parse($request->Date);
            $mypanier->save();

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
        Mypanier::where('idPanier', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

