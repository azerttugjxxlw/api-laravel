<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mysortiestock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MysortiestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mysortiestock = Mysortiestock::all();
        $data = array(
            "success" => true,
            "data" => $mysortiestock
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
            'RefSortie' => 'required|string|max:255',
            'DateSortie' => 'required|date',
            'QteSortie' => 'required|numeric',
            'SortieEtat' => 'required|string|max:255',
            'MotifSortie' => 'required|string|max:255',
        ]);

        if ($validator->passes()) {
            $mysortiestock = new Mysortiestock();

            $mysortiestock->RefSortie = $request->RefSortie;
            $mysortiestock->QteSortie = $request->QteSortie;
            $mysortiestock->SortieEtat = $request->SortieEtat;
            $mysortiestock->MotifSortie = $request->MotifSortie;
            $mysortiestock->DateSortie = Carbon::parse($request->DateSortie);
            $mysortiestock->save();

            $data = array(
                "message" => "Item Created Successfully!",
                "success" => true,
                "data" => $mysortiestock
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
        $mysortiestock = Mysortiestock::where('RefSortie', $id)->first();
        $data = array(
            "success" => true,
            "data" => $mysortiestock
        );
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $mysortiestock = Mysortiestock::where('RefSortie', $id)->first();
        $validator = Validator::make($request->all(), [
            'RefSortie' => 'required',
            'DateSortie' => 'required|date',
            'QteSortie' => 'required|numeric',
            'SortieEtat' => 'required',
            'MotifSortie' => 'required|string',
        ]);

        if ($validator->passes()) {

            $mysortiestock->RefSortie = $request->RefSortie;
            $mysortiestock->QteSortie = $request->QteSortie;
            $mysortiestock->SortieEtat = $request->SortieEtat;
            $mysortiestock->MotifSortie = $request->MotifSortie;

            $mysortiestock->DateSortie = Carbon::parse($request->DateSortie);
            $mysortiestock->save();

            $data = array(
                "message" => "Item Updated Successfully!",
                "success" => true,
                "data" => $mysortiestock
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
        Mysortiestock::where('RefSortie', $id)->delete();
        $data = array(
            "message" => "Item Deleted Successfully!",
            "success" => true
        );
        return response()->json($data, 200);
    }
}

