<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmployeeRequisition;
use App\Models\RequisitionSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
    public function allDepartment(){
        try{
            $departments = Department::select('DeptCode', 'DeptName')->where('Active', 'Y')->get();

            return response()->json([
                'data' => $departments,
                'status' => 'success',
                'message'=>'Portfolio Name need to be unique!'
            ]);
        }
        catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }

    public function storeRecruitmentRequisition(Request $request)
    {
        try{
            $formData = $request->formData;
            $specifications = $request->specifications;

            // $requisition = new EmployeeRequisition();
            // $requisition->DateOfRequisition = $formData['dateOfRequisition'];
            // $requisition->Department = $formData['department']['DeptCode'];
            // $requisition->JobTitle = $formData['jobTitle'];
            // $requisition->SalaryRange = $formData['salaryRange'];
            // $requisition->ReportingTo = $formData['reportingTo'];
            // $requisition->Manpower = $formData['manpower'];
            // $requisition->JobLocation = $formData['jobLocation'];
            // $requisition->JoiningDate = $formData['joiningDate'];
            // $requisition->EmploymentType = $formData['employmentType'];
            // $requisition->RecruitmentType = $formData['recruitmentType'];
            // $requisition->ActiveStatus = 'Y';
            // $requisition->save();

            $employeeRequisition = EmployeeRequisition::create([
                'DateOfRequisition' => $formData['dateOfRequisition'],
                'Department' => $formData['department']['DeptCode'],
                'JobTitle' => $formData['jobTitle'],
                'SalaryRange' => $formData['salaryRange'],
                'ReportingTo' => $formData['reportingTo'],
                'Manpower' => $formData['manpower'],
                'JobLocation' => $formData['jobLocation'],
                'JoiningDate' => $formData['joiningDate'],
                'EmploymentType' => $formData['employmentType'],
                'RecruitmentType' => $formData['recruitmentType'],
                'ActiveStatus' => 'Y'
            ]);

            // return $employeeRequisition->RequisitionID;
            if(count($specifications) > 0){
                foreach($specifications as $specification){
                    DB::table('RequisitionSpecification')->insert([
                        'RequisitionID' => $employeeRequisition->RequisitionID,
                        'Specification' => $specification['details']
                    ]);
                    // RequisitionSpecification::create([
                    //     'RequisitionID' => $employeeRequisition->RequisitionID,
                    //     'Specification' => $specification['details']
                    // ]);
                }
            }
            
            return response()->json([
                'status' => 'success',
                'message'=>'Employee Requisition Inserted Successfully!'
            ]);
        }
        catch (\Exception $exception) {
            return $exception;
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! '.$exception->getMessage()
            ],500);
        }
    }
}
