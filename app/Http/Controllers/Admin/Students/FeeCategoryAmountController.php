<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\Students\FeeCategoryAmount;
use App\Models\Students\StudentClass;
use App\Models\Students\StudentFeeCategory;
use Illuminate\Http\Request;

class FeeCategoryAmountController extends Controller
{
    public function index()
    {
        $fee_category_amounts = FeeCategoryAmount::with('studentFeeCategory')->select('student_fee_category_id')->groupBy('student_fee_category_id')->get();
        return view('admin.students.fee-category-amount.index',compact('fee_category_amounts'));
    }


    public function create()
    {
        $student_fee_categories = StudentFeeCategory::latest()->get();
        $student_classes = StudentClass::latest()->get();
        return view('admin.students.fee-category-amount.create',compact('student_fee_categories','student_classes'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $countClass = count($request->student_class_id);
        if ($countClass != null) {
            for ($i=0; $i < $countClass; $i++) {
                $fee_category_amount = new FeeCategoryAmount();
                $fee_category_amount->student_fee_category_id = $request->student_fee_category_id;
                $fee_category_amount->student_class_id = $request->student_class_id[$i];
                $fee_category_amount->amount = $request->amount[$i];
                $fee_category_amount->save();
            }
        }

        return back()->with('success','Fee Category Amount Created Successfully Completed!');
    }


    public function show($id)
    {
        $fee_category_amounts = FeeCategoryAmount::where('student_fee_category_id',$id)->get();
        return view('admin.students.fee-category-amount.show',compact('fee_category_amounts'));
    }

    public function edit($id)
    {
        $fee_category_amounts = FeeCategoryAmount::where('student_fee_category_id', $id)->get();
        $student_fee_categories = StudentFeeCategory::latest()->get();
        $student_classes = StudentClass::latest()->get();
        return view('admin.students.fee-category-amount.edit', compact('fee_category_amounts','student_fee_categories','student_classes'));
    }

    public function update($id,Request $request)
    {
        // return $request->all();
        if($request->student_class_id != null){
            FeeCategoryAmount::where('student_fee_category_id', $id)->delete();
            $countClass = count($request->student_class_id);
            if ($countClass != null) {
                for ($i = 0; $i < $countClass; $i++) {
                    $fee_category_amount = new FeeCategoryAmount();
                    $fee_category_amount->student_fee_category_id = $request->student_fee_category_id;
                    $fee_category_amount->student_class_id = $request->student_class_id[$i];
                    $fee_category_amount->amount = $request->amount[$i];
                    $fee_category_amount->save();
                }
            }
            return back()->with('success', 'Fee Category Amount Updated Successfully Completed!');

        }else{
            return back()->with('error', 'Please Select latest one Student class, Try again!');
        }


    }
}
