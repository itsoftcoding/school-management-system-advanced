<?php

namespace App\Http\Livewire\Admin\Students\Shifts;

use Livewire\Component;

class StudentShift extends Component
{
    public function render()
    {
        return view('livewire.admin.students.shifts.student-shift')->extends('layouts.admin.app');
    }
}
