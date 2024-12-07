<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mycategorie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MycategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mycategorie = Mycategorie::all();
        $data = array(
            "success" => true,
            "data" => $mycategorie
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
            'DesignCateg' => 'required|string|max:255',
            'LettreCle' => 'required|string|max:255',
            'Nb_Bout' => 'required|numeric|min:0',
        ]);

        if ($validator->passes()) {
            $mycategorie = new Mycategorie();

            $mycategorie->DesignCateg = $request->DesignCateg;
            $mycategorie->LettreCle = $request->NomDef;
            $mycategorie->Nb_Bout = $request->Nb_Bout;

            $mycategorie->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $mycategorie
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
        $mycategorie = Mycategorie::where('DesignCateg', $id)->first();
        $data = array(
            "success" => true,
            "data" => $mycategorie
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $mycategorie = Mycategorie::where('DesignCateg', $id)->first();
        $validator = Validator::make($request->all(), [
            'DesignCateg' => 'required',
            'LettreCle' => 'required',
            'Nb_Bout' => 'required',

        ]);

        if ($validator->passes()) {

            $mycategorie->DesignCateg = $request->DesignCateg;
            $mycategorie->LettreCle = $request->LettreCle;
            $mycategorie->Nb_Bout = $request->Nb_Bout;
            $mycategorie->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $mycategorie
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
        Mycategorie::where('DesignCateg', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

