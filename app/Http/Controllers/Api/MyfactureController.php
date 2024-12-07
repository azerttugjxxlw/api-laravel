<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Myfacture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class MyfactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myfacture = Myfacture::all();
        $data = array(
            "success" => true,
            "data" => $myfacture
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
            'idFacture' => 'required',
            'NumFacture' => 'required|string|max:255',
            'NbPdt' => 'required|numeric',
            'MontFacture' => 'required|numeric',
            'Date' => 'required|date',
        ]);

        if ($validator->passes()) {
            $myfacture = new Myfacture();

            $myfacture->idFacture = $request->idFacture;
            $myfacture->NumFacture = $request->NumFacture;
            $myfacture->NbPdt = $request->NbPdt;
            $myfacture->MontFacture = $request->MontFacture;
            $myfacture->Date = Carbon::parse($request->Date);
            $myfacture->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $myfacture
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
        $myfacture = Myfacture::where('idFacture', $id)->first();
        $data = array(
            "success" => true,
            "data" => $myfacture
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $myfacture = Myfacture::where('idFacture', $id)->first();
        $validator = Validator::make($request->all(), [
            'idFacture'   => 'required',
            'NumFacture'  => 'required',
            'NbPdt'       => 'required',
            'MontFacture' => 'required',
            'Date'        => 'required',
        ]);

        if ($validator->passes()) {

            $myfacture->idFacture = $request->idFacture;
            $myfacture->NumFacture = $request->NumFacture;
            $myfacture->NbPdt = $request->NbPdt;
            $myfacture->MontFacture = $request->MontFacture;
            $myfacture->Date = Carbon::parse($request->Date);
            $myfacture->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $myfacture
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
        Myfacture::where('idFacture', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

