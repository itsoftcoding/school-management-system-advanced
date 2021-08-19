<?php

namespace App\Http\Livewire\Admin\Subjects;

use App\Models\Admin\Subject;
use Livewire\Component;

class AddSubject extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:40|unique:subjects,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $subject = new Subject();
        $subject->name = $this->name;
        if ($subject->save()) {
            session()->flash('success', 'Subject Created Successfully Completed.');
            $this->emit('refreshSubject');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.subjects.add-subject');
    }
}
