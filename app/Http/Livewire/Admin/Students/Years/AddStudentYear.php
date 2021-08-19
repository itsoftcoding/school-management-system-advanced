<?php

namespace App\Http\Livewire\Admin\Students\Years;

use Livewire\Component;
use App\Models\Students\StudentYear;

class AddStudentYear extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|numeric|unique:student_years,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $student_year = new StudentYear();
        $student_year->name = $this->name;
        if ($student_year->save()) {
            session()->flash('success', 'Student Year Created Successfully Completed.');
            $this->emit('refreshStudentYear');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }


    public function render()
    {
        return view('livewire.admin.students.years.add-student-year');
    }
}
