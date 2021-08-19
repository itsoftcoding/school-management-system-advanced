<?php

namespace App\Http\Livewire\Admin\Students\FeeCategory;

use Livewire\Component;

class StudentFeeCategory extends Component
{
    public function render()
    {
        return view('livewire.admin.students.fee-category.student-fee-category')->extends('layouts.admin.app');
    }
}
