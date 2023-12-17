<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\PortfolioStoreRequest;
use App\Http\Resources\SEP\PortfolioCollection;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PortfolioController extends Controller
{
    public function index(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $role = $payload['Type'];
        $DivCode = $request->DivCode;
        if ($role == 'admin'){
            $port = Portfolio::query();
            if ($DivCode){
                $port = $port->where('DivisionID',$DivCode);
            }
            $port = $port->orderBy('PortfolioID','desc')->paginate(15);

        }else{
            $port = Portfolio::with('division')->orderBy('PortfolioID','desc')->paginate(15);
        }

        return new PortfolioCollection($port);
    }
    public function search($query)
    {
        return new PortfolioCollection(Portfolio::where('PortfolioName','LIKE',"%$query%")->paginate(10));
    }
    public function store(PortfolioStoreRequest $request){
        try {
            $port= new Portfolio();
            $port->DivisionID= $request->DivCode ;
            $port->PortfolioName= $request->PortfolioName ;
            $port->PortfolioCode= $request->PortfolioCode ;
            $port->save();
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
    public function update(PortfolioStoreRequest $request, $PortfolioID){
        try {

            $port= Portfolio::where('PortfolioID',$PortfolioID)->first();
            $port->DivisionID= $request->DivCode ;
            $port->PortfolioName= $request->PortfolioName ;
            $port->PortfolioCode= $request->PortfolioCode ;
            $port->save() ;
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
}
