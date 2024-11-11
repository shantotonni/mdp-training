<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\SendOTP;
use App\Models\TaxCertificate;
use App\Models\TaxCertificateConfigaration;
use App\Models\TaxDeposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaxController extends Controller
{

    public function getSupportingData(Request $request){
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];
        $checkMobile = Personal::select('Name','MobileNo')->where('EmpCode', $empcode)->first();
        $Mobile = $checkMobile['MobileNo'];
        $Name = $checkMobile['Name'];
        if (substr($Mobile, 0, 1) === '1') {
            // Add '0' at the beginning of the number
            $Mobile = '0' . $Mobile;
        }
        return response()->json([
            'mobileNo' => $Mobile,
            'Name' => $Name,
        ]);
    }
    public function sendOTP(Request $request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $empcode = $payload['EmpCode'];

        try {
                DB::beginTransaction();
                $checkMobile = Personal::select('MobileNo')->where('EmpCode', $empcode)->first();
                $Mobile = $checkMobile['MobileNo'];
                if (substr($Mobile, 0, 1) === '1') {
                    // Add '0' at the beginning of the number
                    $Mobile = '0' . $Mobile;
                }

                if ($Mobile) {
                    $OTP = rand(100000, 999999);
                    $smscontent = "Your OTP for ".$request->ModuleName." is  - " . $OTP. " Please enter this on the verification \n Thanks \n ACI Tax Department";
                    $otp = new SendOTP();
                    $otp->Mobile = $Mobile;
                    $otp->OTPCode = $OTP;
                    $otp->EmpCode = $empcode;
                    $otp->ModuleName = $request->ModuleName;
                    $otp->SentTime = Carbon::now();
                    $otp->status = 0;
                    $otp->CreatedDate = Carbon::now();
                    $otp->save();

                    $to = $Mobile;
                    $sId = '8809617615000';
                    $applicationName = 'MDP Training';
                    $moduleName = $request->ModuleName;
                    $otherInfo = '';
                    $userId = $OTP;
                    $vendor = 'smsq';
                    $message = $smscontent;
                    $this->sendSmsQ($to, $sId, $applicationName, $moduleName, $otherInfo, $userId, $vendor, $message);
                    DB::commit();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Successfully Send',
                        'mobileNo' => $Mobile
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Mobile No Not Found',
                    ]);
                }


        } catch (\Exception $e) {
            return response()->json([
                'status' => 401,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function verifyOTP(Request $request)
    {
        DB::beginTransaction();
        try {
            $token = $request->bearerToken();
            $payload = JWTAuth::setToken($token)->getPayload();
            $EmpCode = $payload['EmpCode'];
            $checkMobile = Personal::select('MobileNo')->where('EmpCode', $EmpCode)->first();
            $Mobile = $checkMobile['MobileNo'];
            $OTPCode = $request->OTPCode;
            if (substr($Mobile, 0, 1) === '1') {
                // Add '0' at the beginning of the number
                $Mobile = '0' . $Mobile;
            }

            $otp_verify = SendOTP::query()
                ->where('EmpCode', $EmpCode)
                ->where('Mobile', $Mobile)
                ->where('OtpCode', $OTPCode)
                ->where('SentTime', '>=', Carbon::now()->subMinutes(5))
                ->orderBy('SentTime', 'desc')->first();

            if ($otp_verify) {
                $otp_verify->Status = 1;
                $otp_verify->save();

                //$checkCompany = TaxCertificate::select('Company')->where('EmpCode',$EmpCode)->first();
                //$companyName = $checkCompany->Company;

                $TaxCertificate =  TaxCertificate::where('EmpCode',$EmpCode)->first();
                $TaxDeposit =  TaxDeposit::where('EmpCode',$EmpCode)->get();

                //return $TaxDeposit;

                DB::commit();
                return response()->json([
                    'status' => 'success',
                    //'message' => 'Successfully Verify',
                    //'TaxCertificate' => $TaxCertificate[0],
                    'message' => 'Successfully Verified',
                    'TaxCertificate' => $TaxCertificate,
                    'TaxDeposit' => $TaxDeposit,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Otp Or Expired'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 401,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getTaxData(Request $request)
    {
        $token = $request->bearerToken();
        $payload = JWTAuth::setToken($token)->getPayload();
        $EmpCode = $payload['EmpCode'];
        $fiscalYear = $this->getFiscalYear();

        //$getCompany = DB::connection('HRPayroll')->select("Select c.company from employer a,TaxCompany c where a.empcode = '$EmpCode' and a.deptcode=c.deptcode");
        //$companyName = $getCompany[0]->company;
//        $TaxCertificate = DB::connection('HRPayroll')->select("Execute sp_TaxCertificate '2023-2024','$EmpCode','$companyName','%', 99, 'A', '%', 'su'");
//        $TaxDeposit = DB::connection('HRPayroll')->select("Execute sp_TaxDeposit '2023-2024','$EmpCode','$companyName'");
        $checkCompany = TaxCertificate::select('Company')->where('EmpCode',$EmpCode)->first();
        $companyDesignTemplate='';
        if(!empty($checkCompany->Company)){
            $companyName = $checkCompany->Company;
            $companyDesignTemplate=  TaxCertificateConfigaration::where('CompanyName',$companyName)->first();
        }

        $TaxCertificate =  TaxCertificate::where('EmpCode',$EmpCode)->first();
        $TaxDeposit =  TaxDeposit::where('EmpCode',$EmpCode)->where('taxYear',$fiscalYear)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully Verify',
            'TaxCertificate' => $TaxCertificate,
            'TaxDeposit' => $TaxDeposit,
            'EmpCode' => $EmpCode,
            'companyDesignTemplate' => $companyDesignTemplate,
        ]);
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
            CURLOPT_POSTFIELDS => 'To=' . $to . '&SID=' . $sId . '&ApplicationName=' . urlencode($applicationName) . '&ModuleName=' . urlencode($moduleName) . '&OtherInfo=' . urlencode($otherInfo) . '&userID=' . $userId . '&Message=' . $message . '&SmsVendor=' . $vendor,
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
    function getFiscalYear(Carbon $date = null)
    {
        // Default to the current date if no date is provided
        $date = $date ?: Carbon::now();

        // Define the start of the fiscal year
        $fiscalYearStartMonth = 7; // April
        $fiscalYearStartDay = 1;   // 1st of April

        // Determine the fiscal year based on the given date
        if ($date->month >= $fiscalYearStartMonth && $date->day >= $fiscalYearStartDay) {
            $startYear = $date->year;
            $endYear = $date->addYear()->year;
        } else {
            $startYear = $date->subYear()->year;
            $endYear = $date->year;
        }

        return "{$startYear}-{$endYear}";
    }
    function getLastFiscalYear(Carbon $date = null)
    {
        $currentDate = Carbon::now();
        $currentYear = $currentDate->year;
        $currentMonth = $currentDate->month;

        // Determine the start and end year of the last fiscal year
        if ($currentMonth >= 6) {
            // Fiscal year starts from April of the current year to March of the next year
            $startYear = $currentYear - 1;
            $endYear = $currentYear;
        } else {
            // Fiscal year starts from April of the previous year to March of the current year
            $startYear = $currentYear - 2;
            $endYear = $currentYear - 1;
        }

        $startOfLastFiscalYear = Carbon::createFromDate($startYear, 4, 1);
        $endOfLastFiscalYear = Carbon::createFromDate($endYear, 3, 31);


        return "{$startOfLastFiscalYear->format('Y')}-{$endOfLastFiscalYear->format('Y')}";
    }

}
