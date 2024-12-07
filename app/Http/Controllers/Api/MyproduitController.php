<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Myproduit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MyproduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /* $myproduits = Myproduit::all();
        $data = array(
            "success" => true,
            "data" => $myproduits
        );
        return response()->json($data, 200);*/
        $myproduits = Myproduit::all();
        return response()->json($myproduits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $validator = Validator::make($request->all(), [
            'CodePdt' => 'required|string|max:255',
            'DesignPdt' => 'required|string|max:255',
            'QteStockAlerte' => 'required|numeric|min:0',
            'QteStockSec' => 'required|numeric|min:0',
            'DateMotif' => 'required|date',
            'CodeFournis' => 'required|string|max:255',
            'PvteCas' => 'required|numeric|min:0',
            'TypePdt' => 'required|string|max:255',
            'PdtTVA' => 'required|numeric|min:0',
        ]);

        if ($validator->passes()) {
            $myproduits = new Myproduit();
            $myproduits->CodePdt = $request->CodePdt;
            $myproduits->DesignPdt = $request->DesignPdt;
            $myproduits->QteStockAlerte = $request->QteStockAlerte;
            $myproduits->QteStockSec = $request->QteStockSec;
            $myproduits->CodeFournis = $request->CodeFournis;
            $myproduits->PvteCas = $request->PvteCas;
            $myproduits->TypePdt = $request->TypePdt;
            $myproduits->PdtTVA = $request->PdtTVA;
            $myproduits->DateMotif = Carbon::parse($request->DateMotif);
            $myproduits->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $myproduits
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
        $myproduits = Myproduit::where('CodePdt', $id)->first();
        $data = array(
            "success" => true,
            "data" => $myproduits
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $myproduits = Myproduit::where('CodePdt', $id)->first();
        $validator = Validator::make($request->all(), [

            'CodePdt' => 'CodePdt',
            'DesignPdt' => 'required',
            'QteStockAlerte' => 'required',
            'QteStockSec' => 'required',
            'DateMotif' => 'required|date',
            'CodeFournis' => 'required',
            'PvteCas' => 'required|numeric',
            'TypePdt' => 'required',
            'PdtTVA' => 'required|numeric',
        ]);

        if ($validator->passes()) {

            $myproduits-> CodePdt= $request->CodePdt;
            $myproduits-> DesignPdt= $request->DesignPdt;
            $myproduits-> QteStockAlerte= $request->QteStockAlerte;
            $myproduits-> QteStockSec= $request->QteStockSec;
            $myproduits->CodeFournis = $request->CodeFournis;
            $myproduits->PvteCas = $request->PvteCas;
            $myproduits->TypePdt = $request->TypePdt;
            $myproduits-> PdtTVA= $request->PdtTVA;
            $myproduits->DateMotif = Carbon::parse($request->DateMotif);
            $myproduits->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $myproduits
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
        Myproduit::where('CodePdt', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}
