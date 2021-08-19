<?php

namespace App\Http\Livewire\Admin\Exams\ExamTypes;

use Livewire\Component;

class ExamType extends Component
{
    public function render()
    {
        return view('livewire.admin.exams.exam-types.exam-type')->extends('layouts.admin.app');
    }
}
