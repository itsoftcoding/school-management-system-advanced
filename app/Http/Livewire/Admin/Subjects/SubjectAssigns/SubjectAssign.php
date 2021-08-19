<?php

namespace App\Http\Livewire\Admin\Subjects\SubjectAssigns;

use Livewire\Component;

class SubjectAssign extends Component
{
    public function render()
    {
        return view('livewire.admin.subjects.subject-assigns.subject-assign')->extends('layouts.admin.app');
    }
}
