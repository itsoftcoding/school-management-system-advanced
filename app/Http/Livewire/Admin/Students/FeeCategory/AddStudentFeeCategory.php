<?php

namespace App\Http\Livewire\Admin\Students\FeeCategory;

use App\Models\Students\StudentFeeCategory;
use Livewire\Component;

class AddStudentFeeCategory extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:20|unique:student_fee_categories,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $student_fee_category = new StudentFeeCategory();
        $student_fee_category->name = $this->name;
        if ($student_fee_category->save()) {
            session()->flash('success', 'Student Fee Category Created Successfully Completed.');
            $this->emit('refreshStudentFeeCategory');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.students.fee-category.add-student-fee-category');
    }
}
