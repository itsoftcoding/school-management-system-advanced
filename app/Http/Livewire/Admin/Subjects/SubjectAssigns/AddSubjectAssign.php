<?php

namespace App\Http\Livewire\Admin\Subjects\SubjectAssigns;

use Livewire\Component;
use App\Models\Admin\Subject;
use App\Models\Admin\SubjectAssign;
use App\Models\Students\StudentClass;

class AddSubjectAssign extends Component
{
    public $inputs = [];
    public $repeter = 0;

    public $student_class_id;
    public $subject_id;
    public $subject_code;
    public $full_mark;
    public $pass_mark;
    public $subjective_mark;

    public function add($i)
    {
        $i = $i + 1;
        $this->repeter = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i, $key)
    {
        unset($this->student_class_id[$key]);
        unset($this->subject_id[$key]);
        unset($this->subject_code[$key]);
        unset($this->full_mark[$key]);
        unset($this->pass_mark[$key]);
        unset($this->subjective_mark[$key]);
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $student_classes = StudentClass::get();
        $subjects = Subject::get();
        return view('livewire.admin.subjects.subject-assigns.add-subject-assign',compact('student_classes','subjects'));
    }


    public function save()
    {
        $this->validate([
            'student_class_id' => 'required|numeric',
            'subject_id.0' => 'required|numeric',
            'subject_code.0' => 'required | numeric',
            'full_mark.0' => 'required | numeric',
            'pass_mark.0' => 'nullable | numeric',
            'subjective_mark.0' => 'nullable|numeric',
            'subject_id.*' => 'required|numeric',
            'subject_code.*' => 'required | numeric',
            'full_mark.*' => 'required | numeric',
            'pass_mark.*' => 'nullable | numeric',
            'subjective_mark.*' => 'nullable|numeric'
        ]);


        foreach ($this->subject_id as $key => $value) {
            # code...
            $subject_assign = new SubjectAssign();
            $subject_assign->student_class_id = $this->student_class_id;
            $subject_assign->subject_id = $this->subject_id[$key];
            $subject_assign->subject_code = $this->subject_code[$key];
            $subject_assign->full_mark = $this->full_mark[$key];
            $subject_assign->pass_mark = $this->pass_mark[$key];
            $subject_assign->subjective_mark = $this->subjective_mark[$key];
            $subject_assign->save();
        }


        session()->flash('success', 'Subject Assign Created Successfully Completed.');
    }
}
