<?php

namespace App\Http\Livewire\Admin\Students\Shifts;

use App\Models\Students\StudentShift;
use Livewire\Component;
use Livewire\WithPagination;

class ManageStudentShift extends Component
{
    use WithPagination;


    protected $listeners = ['refreshStudentShift' => '$refresh'];

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
        $student_shifts = StudentShift::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.admin.students.shifts.manage-student-shift',compact('student_shifts'));
    }
}
