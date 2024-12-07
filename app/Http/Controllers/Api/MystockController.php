<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mystock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MystockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mystock = Mystock::all();
        $data = array(
            "success" => true,
            "data" => $mystock
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
            'idStock' => 'required|string',
            'QteStock' => 'required|integer|min:1',
            'DateMotif' => 'required|date',
            'TransFApp' => 'required|integer|max:1',
        ]);

        if ($validator->passes()) {
            $mystock = new Mystock();

            $mystock->idStock = $request->idStock;
            $mystock->QteStock = $request->QteStock;
            $mystock->DateMotif = $request->DateMotif;
            $mystock->TransFApp = $request->TransFApp;
            $mystock->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $mystock
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
        $mystock = Mystock::where('idStock', $id)->first();
        $data = array(
            "success" => true,
            "data" => $mystock
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $mystock = Mystock::where('idStock', $id)->first();
        $validator = Validator::make($request->all(), [
'idStock' => 'required',
'QteStock' => 'required|numeric',
'DateMotif' => 'required|date',
'TransFApp' => 'required'

        ]);

        if ($validator->passes()) {

            $mystock->idStock = $request->idStock;
            $mystock->QteStock = $request->QteStock;
            $mystock->DateMotif = $request->DateMotif;
            $mystock->TransFApp = $request->TransFApp;
            $mystock->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $mystock
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
        Mystock::where('RefSortie', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

