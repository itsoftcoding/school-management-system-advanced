<?php

namespace App\Http\Livewire\Admin\Subjects\SubjectAssigns;

use Livewire\Component;
use App\Models\Admin\Subject;
use App\Models\Admin\SubjectAssign;
use App\Models\Students\StudentClass;

class ManageSubjectAssign extends Component
{
    public $show_subject_assigns = [];
    public $edit_subject_assigns = [];

    public $delete_id;
    protected $rules = [
        'edit_subject_assigns.*.student_class_id' => 'required|numeric',
        'edit_subject_assigns.*.subject_id' => 'required|numeric',
        'edit_subject_assigns.*.subject_code' => 'required|numeric',
        'edit_subject_assigns.*.full_mark' => 'required|numeric',
        'edit_subject_assigns.*.pass_mark' => 'required|numeric',
        'edit_subject_assigns.*.subjective_mark' => 'required|numeric',
    ];

    public function render()
    {
        $subject_assigns = SubjectAssign::select('student_class_id')->groupBy('student_class_id')->get();
        $student_classes = StudentClass::get();
        $subjects = Subject::get();
        return view('livewire.admin.subjects.subject-assigns.manage-subject-assign',compact('subject_assigns','subjects','student_classes'));
    }

    public function show($id)
    {
        $this->show_subject_assigns = SubjectAssign::where('student_class_id',$id)->get();
    }

    public function edit($id)
    {
        $this->edit_subject_assigns = SubjectAssign::where('student_class_id', $id)->get();
    }

    public function delete($id){
        SubjectAssign::findOrFail($this->delete_id)->delete();
        $this->edit_subject_assigns = SubjectAssign::where('student_class_id', $id)->get();
        $this->delete_id = null;
    }

    public function save()
    {
        // dd($this->edit_category_amounts);
        foreach ($this->edit_subject_assigns as $key => $value) {
            $subject_assign = SubjectAssign::find($value->id);
            $subject_assign->subject_id = $value->subject_id;
            $subject_assign->subject_code = $value->subject_code;
            $subject_assign->full_mark = $value->full_mark;
            $subject_assign->pass_mark = $value->pass_mark;
            $subject_assign->subjective_mark = $value->subjective_mark;
            $subject_assign->save();
        }

        session()->flash('success', 'Subject Assign updated Successfully Completed.');
    }
}
