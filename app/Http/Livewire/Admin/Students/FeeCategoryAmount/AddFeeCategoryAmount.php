<?php

namespace App\Http\Livewire\Admin\Students\FeeCategoryAmount;

use Livewire\Component;
use App\Models\Students\StudentClass;
use App\Models\Students\FeeCategoryAmount;
use App\Models\Students\StudentFeeCategory;

class AddFeeCategoryAmount extends Component
{
    public $inputs = [];
    public $repeter = 0;

    public $student_fee_category_id;
    public $student_class_id;
    public $amount;

    public function add($i)
    {
        $i = $i+1;
        $this->repeter = $i;
        array_push($this->inputs,$i);
    }

    public function remove($i,$key)
    {
            unset($this->student_class_id[$key]);
            unset($this->amount[$key]);
            unset($this->inputs[$i]);
    }

    public function save(){
        $this->validate([
                'student_fee_category_id' => 'required',
                'student_class_id.0' => 'required',
                'amount.0' => 'required|numeric',
                'student_class_id.*' => 'required',
                'amount.*' => 'required|numeric',
        ]);

        // dd($this->student_class_id);
        foreach ($this->student_class_id as $key => $value) {
            # code...
            $fee_category_amount = new FeeCategoryAmount();
            $fee_category_amount->student_fee_category_id = $this->student_fee_category_id;
            $fee_category_amount->student_class_id = $this->student_class_id[$key];
            $fee_category_amount->amount = $this->amount[$key];
            $fee_category_amount->save();
        }


            session()->flash('success', 'Student Shift Created Successfully Completed.');


        // dd($this->student_class_id);
    }

    public function render()
    {
        $student_fee_categories = StudentFeeCategory::get();
        $student_classes = StudentClass::get();
        return view('livewire.admin.students.fee-category-amount.add-fee-category-amount',compact('student_fee_categories','student_classes'));
    }
}
