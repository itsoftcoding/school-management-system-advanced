<?php

namespace App\Http\Livewire\Admin\Students\Shifts;

use App\Models\Students\StudentShift;
use Livewire\Component;

class AddStudentShift extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:20|unique:student_shifts,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $student_shift = new StudentShift();
        $student_shift->name = $this->name;
        if ($student_shift->save()) {
            session()->flash('success', 'Student Shift Created Successfully Completed.');
            $this->emit('refreshStudentShift');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.students.shifts.add-student-shift');
    }
}
