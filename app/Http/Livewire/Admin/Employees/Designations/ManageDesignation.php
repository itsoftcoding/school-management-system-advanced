<?php

namespace App\Http\Livewire\Admin\Employees\Designations;

use App\Models\Employees\Designation;
use Livewire\Component;
use Livewire\WithPagination;

class ManageDesignation extends Component
{
    use WithPagination;


    protected $listeners = ['refreshDesignation' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    public $per_page = 10;
    public $search;
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $designations = Designation::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.admin.employees.designations.manage-designation',compact('designations'));
    }
}
