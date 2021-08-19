<?php

namespace App\Http\Livewire\Admin\Exams\ExamTypes;

use App\Models\Admin\ExamType;
use Livewire\Component;

class AddExamType extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:40|unique:exam_types,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $exam_type = new ExamType();
        $exam_type->name = $this->name;
        if ($exam_type->save()) {
            session()->flash('success', 'Exam Type Created Successfully Completed.');
            $this->emit('refreshExamType');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }
    public function render()
    {
        return view('livewire.admin.exams.exam-types.add-exam-type');
    }
}
