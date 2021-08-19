<?php

namespace App\Http\Livewire\Admin\Employees\Designations;

use Livewire\Component;

class Designation extends Component
{
    public function render()
    {
        return view('livewire.admin.employees.designations.designation')->extends('layouts.admin.app');
    }
}
