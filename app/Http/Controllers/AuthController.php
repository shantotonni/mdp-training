<?php

namespace App\Http\Controllers;

use App\Models\ActionPlan;
use App\Models\Admin;
use App\Models\ContactPersonal;
use App\Models\Employee;
use App\Models\jwt\JWT;
use App\Models\ManagementDevelopmentPlane;
use App\Models\Personal;
use App\Models\User;
use App\Models\UserLog;
use App\Services\AccessLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'EmpCode' => 'required|string',
                'Password' => 'required|string|min:4',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Invalid'], 400);
            }
            $empcode =strtoupper($request->EmpCode);
            $password =$request->Password;
            if ($empcode[0]!='C'){
                $user = User::select('UserManagerOnlineApp.*','e.Name')
                    ->join('Personal as e','e.EmpCode','=','UserManagerOnlineApp.EmpCode')
                    ->where('UserManagerOnlineApp.EmpCode', $empcode)
                    ->where('UserManagerOnlineApp.Password', $request->Password)
                    ->where('e.Active','=','Y')
                    ->first();
                if ($user) {
                    $userInfo = [
                        'EmpCode' => $user->EmpCode,
                        'staffCode' => $user->EmpCode,
                        'Name' => $user->Name,
                        'Business' => '',
                        'type' => 'employee',
                    ];
                    return response()->json([
                        'status' => 'success',
                        'access_token' => $this->generateToken($userInfo)
                    ], 200);
                }else{
                    $is_admin = Admin::select('MDPAdminUser.*','e.Name')->where('MDPAdminUser.EmpCode', $empcode)->where('MDPAdminUser.Password', $request->Password)
                        ->join('Personal as e','e.EmpCode','=','MDPAdminUser.EmpCode')
                        ->where('e.Active','=','Y')
                        ->first();

                    if ($is_admin) {
                        $user = [
                            'EmpCode' => $empcode,
                            'staffCode' => $empcode,
                            'Business' => $is_admin->Business,
                            'Name' => $is_admin->Name,
                            'type' => $is_admin->type,
                        ];
                        return response()->json([
                            'status' => 'success',
                            'access_token' => $this->generateToken($user)
                        ], 200);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'User/Password Wrong'
                        ], 404);
                    }
                }
            }else{

                $path = storage_path('app/public/data/supervisor_list.json'); // Adjust path if needed
                $supervisorData = json_decode(file_get_contents($path), true);
                $matched = collect($supervisorData)->first(function($item) use ($empcode, $password) {
                    return $item['StaffID'] === $empcode && $item['Password'] === $password;
                });

                if ($matched){
                    $user = ContactPersonal::where('EmpCode','=', $matched['StaffID'])->first();
                    if ($user) {
                        $userInfo = [
                            'EmpCode' => $user->EmpCode,
                            'staffCode' => $user->EmpCode,
                            'Name' => $user->Name,
                            'Business' => '',
                            'type' => 'employee',
                        ];
                        return response()->json([
                            'status' => 'success',
                            'access_token' => $this->generateToken($userInfo)
                        ], 200);
                    }else{
                        return response()->json([
                            'status' => 'error',
                            'message' => 'User Not Found'
                        ], 404);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'User/Password Wrong'
                    ], 404);
                }
            }
        }catch (Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong' .$exception->getMessage()
            ], 404);
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
        $const = strtolower($empcode);

        if (  $const[0] !='c'){
            $personal = Employee::where('EmpCode', $empcode)->with('email','personal')->first();

        }else{
            $personal = ContactPersonal::where('EmpCode', $empcode)->with('email')->first();
        }
        $departments = [];
        $divisions = [];
        if (!$personal) {
            $departments = ActionPlan::select('Department')->groupBy('Department')->get();
            $divisions = ActionPlan::select('Division')->groupBy('Division')->get();
        }
        $MDPAppraisalPeriod = ManagementDevelopmentPlane::select(DB::raw("left(AppraisalPeriod,4) as thisYear,Right(AppraisalPeriod,4) as NextYear"))->where('StaffID', $empcode)->orderby('ID','DESC')->first();
        if (!empty($MDPAppraisalPeriod)){
            $nextYear=($MDPAppraisalPeriod->NextYear)+1;
            $period = ($MDPAppraisalPeriod->NextYear).'-'.$nextYear;
        }else{
            $prevYear=date('Y', strtotime('-1 year'));
            $nextYear=date('Y', strtotime('+1 year'));
            $period=date('Y').'-'.$nextYear;
        }
        return response()->json([
            'personal' => $personal,
            'payload' => $payload,
            'departments' => $departments,
            'divisions' => $divisions,
            //'appraisalPeriod' => $period,//previous
            'appraisalPeriod' => '2025-2026',
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

    public function generateToken($user)
    {
        $payload = [
            'iat' => time(),
            'iss' => $_SERVER['SERVER_NAME'],
            'exp' => time() + 12 * 30 * (24 * 60 * 60),// 1 Month
            'EmpCode' => $user['EmpCode'],
            'Name' => $user['Name'],
            'staffCode' => $user['staffCode'],
            'Business' => $user['Business'],
            'Type' => $user['type'],
        ];
        try {
            $privateKey = env("JWT_SECRET", "7p2hqLDNnDjWN5n8aAMC0XNVMB3LPU4otV9tV8zXYt2M7q9Z0hxCq2bCQP6ogIiF");
            $token = JWT::encode($payload, $privateKey);
            return $token;
        } catch (\Exception $ex) {
            $token = false;
        }
        return $token;

    }
}
