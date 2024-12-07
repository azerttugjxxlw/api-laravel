<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mydefprix;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MydefprixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myrecap = Mydefprix::all();
        return response()->json($myrecap);
    }



}

