<?php

namespace App\Http\Livewire\Admin\Students\Groups;

use Livewire\Component;

class StudentGroup extends Component
{
    public function render()
    {
        return view('livewire.admin.students.groups.student-group')->extends('layouts.admin.app');
    }
}
