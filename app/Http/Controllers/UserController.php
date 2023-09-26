<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Models\Admin;
use App\Models\Advances;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\SubMenuPermission;
use App\Models\User;
use App\Models\UserBusiness;
use App\Models\UserDepartment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = Admin::orderBy('ID','desc')->paginate(15);
        return new UserCollection($users);
    }

    public function store(Request $request){

        $user = new Admin();
        $user->EmpCode = $request->EmpCode;
        $user->Business = $request->Business;
        $user->type = $request->type;
        $user->Password = $request->Password;
        $user->save();

        return response()->json(['message'=>'User Created Successfully'],200);
    }


    public function update(Request $request, $id){

        $user = Admin::where('ID',$request->ID)->first();
        $user->EmpCode = $request->EmpCode;
        $user->Business = $request->Business;
        $user->type = $request->type;
        //$user->Password = $request->Password;
        $user->save();
        return response()->json(['message'=>'User Updated Successfully'],200);
    }

    public function updatePassword(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'staffId' => 'required|string',
                'password' => 'required|string'
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()], 400);
            }
            $user = User::find($request->staffId);
            $user->Password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Password Updated Successfully'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ],500);
        }
    }

    public function delete($id)
    {
        if (false) {
            return response()->json(['message' => "User is already used!"], 500);
        } else {
            User::where('id', $id)->delete();
            return response()->json(['message' => "User deleted successfully"]);
        }
    }

}
