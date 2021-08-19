<?php

namespace App\Http\Livewire\Admin\Students\FeeCategoryAmount;

use Livewire\Component;

class FeeCategoryAmount extends Component
{
    public function render()
    {
        return view('livewire.admin.students.fee-category-amount.fee-category-amount')->extends('layouts.admin.app');
    }
}
