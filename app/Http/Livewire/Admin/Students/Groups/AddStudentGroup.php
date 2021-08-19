<?php

namespace App\Http\Livewire\Admin\Students\Groups;

use Livewire\Component;
use App\Models\Students\StudentGroup;

class AddStudentGroup extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:20|unique:student_groups,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $student_group = new StudentGroup();
        $student_group->name = $this->name;
        if ($student_group->save()) {
            session()->flash('success', 'Student Group Created Successfully Completed.');
            $this->emit('refreshStudentGroup');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.students.groups.add-student-group');
    }
}
