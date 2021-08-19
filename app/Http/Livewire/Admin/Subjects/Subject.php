<?php

namespace App\Http\Livewire\Admin\Subjects;

use Livewire\Component;

class Subject extends Component
{
    public function render()
    {
        return view('livewire.admin.subjects.subject')->extends('layouts.admin.app');
    }
}
