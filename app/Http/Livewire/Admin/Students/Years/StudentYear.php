<?php

namespace App\Http\Livewire\Admin\Students\Years;

use Livewire\Component;

class StudentYear extends Component
{
    public function render()
    {
        return view('livewire.admin.students.years.student-year')->extends('layouts.admin.app');
    }
}
