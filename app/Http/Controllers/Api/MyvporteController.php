<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Myvporte;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MyvporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myvporte = Myvporte::all();
        $data = array(
            "success" => true,
            "data" => $myvporte
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
'CodeVporte' => 'required|string',
'NomPrenom' => 'required|string',
'ContactVprote' => 'required|string',
'Numpiece' => 'required|string',
'NomPrenomCaution' => 'required|string',
'ContactCaution' => 'required|string',
        ]);

        if ($validator->passes()) {
            $myvporte = new Myvporte();
            $myvporte->CodeVporte = $request->CodeVporte;
            $myvporte->NomPrenom = $request->NomPrenom;
            $myvporte->ContactVprote = $request->ContactVprote;
            $myvporte->Numpiece = $request->Numpiece;
            $myvporte->NomPrenomCaution = $request->NomPrenomCaution;
            $myvporte->ContactCaution = $request->ContactCaution;
            $myvporte->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $myvporte
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
        $myvporte = Myvporte::where('CodeVporte', $id)->first();
        $data = array(
            "success" => true,
            "data" => $myvporte
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $myvporte = Myvporte::where('CodeVporte', $id)->first();
        $validator = Validator::make($request->all(), [
'CodeVporte' => 'required',
'NomPrenom' => 'required',
'ContactVprote' => 'required',
'Numpiece' => 'required',
'NomPrenomCaution' => 'required',
'ContactCaution' => 'required',


        ]);

        if ($validator->passes()) {
            $myvporte->CodeVporte = $request->CodeVporte;
            $myvporte->NomPrenom = $request->NomPrenom;
            $myvporte->ContactVprote = $request->ContactVprote;
            $myvporte->Numpiece = $request->Numpiece;
            $myvporte->NomPrenomCaution = $request->NomPrenomCaution;
            $myvporte->ContactCaution = $request->ContactCaution;
            $myvporte->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $myvporte
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
        Myvporte::where('CodeVporte', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

