<?php

namespace App\Http\Livewire\Admin\Students\FeeCategoryAmount;

use Livewire\Component;
use App\Models\Students\StudentClass;
use App\Models\Students\FeeCategoryAmount;
use App\Models\Students\StudentFeeCategory;

class ManageFeeCategoryAmount extends Component
{
    public $show_fee_category_amounts = [];
    public $edit_category_amounts = [];



    public $delete_id;

    protected $rules = [
        'edit_category_amounts.*.student_fee_category_id' => 'required',
        'edit_category_amounts.*.student_class_id' => 'required',
        'edit_category_amounts.*.amount' => 'required|numeric',
    ];




    public function render()
    {
        $fee_category_amounts = FeeCategoryAmount::with('studentFeeCategory')->select('student_fee_category_id')->groupBy('student_fee_category_id')->get();
        $student_fee_categories = StudentFeeCategory::get();
        $student_classes = StudentClass::get();
        return view('livewire.admin.students.fee-category-amount.manage-fee-category-amount',compact('fee_category_amounts','student_fee_categories','student_classes'));
    }

    public function show($id)
    {
        $this->show_fee_category_amounts = FeeCategoryAmount::where('student_fee_category_id', $id)->get();
    }

    public function edit($id)
    {
        $this->edit_category_amounts = FeeCategoryAmount::where('student_fee_category_id', $id)->get();
    }


    public function delete($id)
    {
        FeeCategoryAmount::findOrFail($this->delete_id)->delete();
        $this->edit_category_amounts = FeeCategoryAmount::where('student_fee_category_id', $id)->get();
    }

    public function save()
    {
        // dd($this->edit_category_amounts);
        foreach ($this->edit_category_amounts as $key => $value) {
            $fee_category_amount = FeeCategoryAmount::find($value->id);
            $fee_category_amount->student_class_id = $value->student_class_id;
            $fee_category_amount->amount = $value->amount;
            $fee_category_amount->save();
        }

        session()->flash('success', 'Fee Category Amount updated Successfully Completed.');
    }
}
