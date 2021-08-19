<?php

namespace App\Http\Livewire\Admin\Students;

use Livewire\Component;
use Livewire\WithFileUploads;

class ManageStudent extends Component
{
    use WithFileUploads;
    public $photo;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'photo.*' => 'image| mimes:png,jpg,jpeg'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.students.manage-student');
    }
}
