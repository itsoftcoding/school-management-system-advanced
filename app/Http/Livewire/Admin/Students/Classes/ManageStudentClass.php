<?php

namespace App\Http\Livewire\Admin\Students\Classes;

use App\Models\Students\StudentClass;
use Livewire\Component;
use Livewire\WithPagination;

class ManageStudentClass extends Component
{
    use WithPagination;


    protected $listeners = ['refreshStudentClass' => '$refresh'];

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
        $student_classes = StudentClass::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')->paginate($this->per_page);

        return view('livewire.admin.students.classes.manage-student-class',compact('student_classes'));
    }
}
