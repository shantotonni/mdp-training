<?php

namespace App\Http\Controllers;

use App\Http\Resources\Student\StudentPaymentBillCollection;
use App\Models\StudentBillPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function studentPayment(Request $request){
        $sessionId = $request->sessionId;
        $categoryId = $request->categoryId;

        $students = StudentBillPayment::query()->with('student','bank','branch','category')
            ->select('student_id','session_id','bank_id','branch_id','category_id','session','currency','name','roll_no','batch_number', DB::raw('sum(amount) as amount'))
            ->groupBy('student_id','session_id','session','bank_id','branch_id','category_id','currency','name','roll_no','batch_number');

        if (!empty($sessionId)){
            $students = $students->where('session_id',$sessionId);
        }
        if (!empty($categoryId)){
            $students = $students->where('category_id',$categoryId);
        }
        if (!empty($request->from_date) && !empty($request->to_date)){
            $students = $students->whereDate('payment_date','>=',$request->from_date)->whereDate('payment_date','<=',$request->to_date);
        }
        $students = $students->paginate(15);

        return new StudentPaymentBillCollection($students);
    }

    public function studentPaymentReport(Request $request){
        $sessionId = $request->sessionId;
        $categoryId = $request->categoryId;

        $students = StudentBillPayment::query()->with('student','bank','branch','category')
            ->select('student_id','session_id','bank_id','branch_id','category_id','session','currency','name','roll_no','batch_number', DB::raw('sum(amount) as amount'))
            ->groupBy('student_id','session_id','session','bank_id','branch_id','category_id','currency','name','roll_no','batch_number');

        if (!empty($sessionId)){
            $students = $students->where('session_id',$sessionId);
        }
        if (!empty($categoryId)){
            $students = $students->where('category_id',$categoryId);
        }
        if (!empty($request->from_date) && !empty($request->to_date)){
            $students = $students->whereDate('payment_date','>=',$request->from_date)->whereDate('payment_date','<=',$request->to_date);
        }
        $students = $students->orderBy('id','desc')->paginate(15);

        return new StudentPaymentBillCollection($students);
    }
}
