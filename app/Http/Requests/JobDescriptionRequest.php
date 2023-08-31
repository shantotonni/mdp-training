<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobDescriptionRequest extends FormRequest
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
            'JobDescriptionPeriod'=>'required',
            'StaffID'=>'required',
            'Division'=>'required',
            'EmployeeName'=>'required',
            'Designation'=>'required',
            'Department'=>'required',
            'Mobile'=>'required|min:11|max:11',
            'SuppervisorStaffID'=>'required',
        ];
    }
}
