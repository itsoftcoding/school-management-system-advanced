<?php

namespace App\Http\Livewire\Admin\Students\Years;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Students\StudentYear;

class ManageStudentYear extends Component
{
    use WithPagination;


    protected $listeners = ['refreshStudentYear' => '$refresh'];

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
        $student_years = StudentYear::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.admin.students.years.manage-student-year',compact('student_years'));
    }
}
