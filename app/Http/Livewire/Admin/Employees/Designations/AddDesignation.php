<?php

namespace App\Http\Livewire\Admin\Employees\Designations;

use Livewire\Component;
use App\Models\Employees\Designation;

class AddDesignation extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|max:32|unique:designations,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $designation = new Designation();
        $designation->name = $this->name;
        if ($designation->save()) {
            session()->flash('success', 'Designation Created Successfully Completed.');
            $this->emit('refreshDesignation');
            $this->name = "";
        } else {
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.employees.designations.add-designation');
    }
}
