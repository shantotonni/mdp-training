<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ManagementDevelopmentPlaneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'AppraisalPeriod'   =>'required',
            'StaffID'           =>'required',
            'EmployeeName'      =>'required',
            'Designation'       =>'required',
            'Department'        =>'required',
            //'OfficialEmail'=>'required',
            'Mobile'            =>'required|min:11|max:11',
            'JoiningDate'       =>'required',
            'CurrentPosition'   =>'required',
            'Qualification'     =>'required',
            'SuppervisorStaffID'=>'required',
            'SuppervisorEmail'  =>'required',
            'Signature'         =>'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $errors,
        ], 422));
    }
}
