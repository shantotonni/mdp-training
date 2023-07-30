<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\jwt\JWT;
use App\Models\Personal;
use App\Models\User;
use App\Models\UserLog;
use App\Services\AccessLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'EmpCode' => 'required|string',
            'Password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid'], 400);
        }

        //$admin_user = ['06865','23215','23401','24793','10259','23283'];
        $admin_dataset = [
            ['EmpCode'=>'06865','Business'=>'','type'=>'admin','password'=>'123123'],
            ['EmpCode'=>'23215','Business'=>'','type'=>'admin','password'=>'123123'],
            ['EmpCode'=>'23401','Business'=>'','type'=>'admin','password'=>'123123'],
            ['EmpCode'=>'24793','Business'=>'','type'=>'admin','password'=>'123123'],
            ['EmpCode'=>'10259','Business'=>'','type'=>'admin','password'=>'123123'],

            ['EmpCode'=>'23283','Business'=>'MIS','type'=>'sadmin','password'=>'123123'],
            ['EmpCode'=>'21005','Business'=>'Consumer Brands','type'=>'sadmin','password'=>'123123'],
        ];

        //$admin_user_found = in_array($request->EmpCode, $admin_user);
        $admin_dataset = collect($admin_dataset);
        $is_admin = $admin_dataset->where('EmpCode',$request->EmpCode)->first();

        if ($is_admin){
            $user = [
                'EmpCode'=>'admin',
                'staffCode'=>$request->EmpCode,
                'Business'=>$is_admin['Business'],
                'type'=>$is_admin['type'],
            ];

            return response()->json([
                'status' => 'success',
                'access_token' => $this->generateToken($user)
            ],200);
        }else{
            $user = User::where('EmpCode', $request->EmpCode)->where('Password',$request->Password)->first();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No user found '
                ],404);
            }
            return response()->json([
                'status' => 'success',
                'access_token' => $this->generateToken($user,'employee')
            ],200);
        }
    }

    public function changePass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPass' => 'required',
            'newPass' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid'], 400);
        }
        $authUser = JWTAuth::parseToken()->authenticate();

        $check = Hash::check($request->oldPass, $authUser->Password);
        if ($check) {
            $user = User::find($authUser->UserID);
            $user->Password = bcrypt($request->newPass);
            $user->save();
            return response()->json(['message' => "Password changed successfully"]);
        } else {
            return response()->json(['message' => "Your current password is Invalid"], 400);
        }
    }

    public function changeProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'image' => 'required',
            'isImageChange' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid'], 400);
        }
        $authUser = JWTAuth::parseToken()->authenticate();
        $user = User::find($authUser->UserID);
        $user->UserName = $request->name;
        $user->Email = $request->email;
        $user->Phone = $request->mobile;
        if ($request->isImageChange) {
            if ($authUser->Avatar !== 'default.png') {
                try {
                    unlink(public_path('uploads/') . $authUser->Avatar);
                } catch (\Exception $e) {
                }
            }
            $image = $request->image;
            $name = rand(0, 10000000) . time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($image)->save(public_path('uploads/') . $name);
            $user->Avatar = $name;
        }
        $user->save();
        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function me(Request $request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];

        $personal = Employee::where('EmpCode',$empcode)->with('email')->first();

        return response()->json([
           'personal'=>$personal,
           'payload'=>$payload,
        ]);

    }

    public function logout()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            //UserLog::create(['UserId' => $user->ID, 'TransactionTime' => Carbon::now(), 'TransactionDetails' => "Logged Out"]);
            $this->guard()->logout();
        } catch (\Exception $exception) {

        }
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }

    public function generateToken($user) {
        $payload = [
            'iat' => time(),
            'iss' => $_SERVER['SERVER_NAME'],
            'exp' => time() + 12*30*(24*60*60),// 1 Month
            'EmpCode' => $user->EmpCode ?? $user['EmpCode'],
            'staffCode' => $user->EmpCode ?? $user['staffCode'],
            'Business' => $user->Business ?? $user['Business'],
            'Type' => $user->type ?? $user['type'],
        ];
        try {
            $privateKey = env("JWT_SECRET", "7p2hqLDNnDjWN5n8aAMC0XNVMB3LPU4otV9tV8zXYt2M7q9Z0hxCq2bCQP6ogIiF");
            $token = JWT::encode($payload,$privateKey);
            return $token;
        } catch (\Exception $ex) {
            $token = false;
        }
        return $token;

    }
}
