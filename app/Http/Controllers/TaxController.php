<?php

namespace App\Http\Controllers;

use App\Models\SendOTP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    public function sendOTP(Request $request){
        DB::beginTransaction();
        try {
            $Mobile = $request->Mobile;
            $OTP = rand(100000,999999);
            $smscontent = 'Otp Code - '.$OTP;

            $otp = new SendOTP();
            $otp->Mobile = $Mobile;
            $otp->OTPCode = $OTP;
            $otp->status = 0;
            $otp->CreatedDate = Carbon::now();
            $otp->save();

            $to = $Mobile;
            $sId = '8809617615000';
            $applicationName = 'MDP Training';
            $moduleName = 'Tax Certification';
            $otherInfo = '';
            $userId = $OTP;
            $vendor = 'smsq';
            $message = $smscontent;
            $this->sendSmsQ($to, $sId, $applicationName, $moduleName, $otherInfo, $userId, $vendor, $message);

            DB::commit();

            return response()->json([
               'status' => 'success',
               'message' => 'Successfully Send'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>401,
                'error'=>$e->getMessage()
            ]);
        }
    }


    public static function sendSmsQ($to, $sId, $applicationName, $moduleName, $otherInfo, $userId, $vendor, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://192.168.102.10/apps/api/send-sms/sms-master',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'To='.$to.'&SID='.$sId.'&ApplicationName='.urlencode($applicationName).'&ModuleName='.urlencode($moduleName).'&OtherInfo='.urlencode($otherInfo).'&userID='.$userId.'&Message='.$message.'&SmsVendor='.$vendor,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}