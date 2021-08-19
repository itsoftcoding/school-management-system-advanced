<?php

namespace App\Http\Livewire\Admin\Students;

use Livewire\Component;

class Student extends Component
{
    public $status = true;

    public function render()
    {
        return view('livewire.admin.students.student')->extends('layouts.admin.app');
    }
}
