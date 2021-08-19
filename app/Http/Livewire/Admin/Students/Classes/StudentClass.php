<?php

namespace App\Http\Livewire\Admin\Students\Classes;

use Livewire\Component;

class StudentClass extends Component
{
    public function render()
    {
        return view('livewire.admin.students.classes.student-class')->extends('layouts.admin.app');
    }
}
