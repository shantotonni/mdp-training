<?php

namespace App\Http\Controllers;

use App\Http\Requests\SEP\PortfolioStoreRequest;
use App\Http\Resources\SEP\PortfolioCollection;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

        $exists = Portfolio::where('PortfolioName','=',$request->PortfolioName)->where('DivisionID',$request->DivCode)->count();
        if($exists) {
            return response()->json([
                'status' => 'success',
                'message'=>'Portfolio Name need to be unique!'
            ]);
        }
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

        $exists = Portfolio::where('PortfolioID',$request->PortfolioID)
            ->where('PortfolioName','!=',$request->PortfolioName)->count();
        if($exists) {
            $exist2 = Portfolio::where('PortfolioName','=',$request->PortfolioName)->where('DivisionID',$request->DivCode)->count();
            if($exist2) {
                return response()->json([
                    'status' => 'success',
                    'message'=>'Portfolio Name need to be unique!'
                ]);
            }
        }
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
