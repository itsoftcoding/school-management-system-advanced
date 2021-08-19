<?php

namespace App\Http\Livewire\Admin\Students\Classes;

use App\Models\Students\StudentClass;
use Livewire\Component;

class AddStudentClass extends Component
{

    public $name;
    public $code;


    protected $rules = [
        'name' => 'required|max:20|unique:student_classes,name',
        'code' => 'required|max:20',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $student_class = New StudentClass();
        $student_class->name = $this->name;
        $student_class->code = $this->code;
        if($student_class->save()){
            session()->flash('success', 'Student Class Created Successfully Completed.');
            $this->emit('refreshStudentClass');
        }else{
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.students.classes.add-student-class');
    }
}
