<?php

namespace App\Http\Livewire\Admin\Students\Groups;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Students\StudentGroup;

class ManageStudentGroup extends Component
{
    use WithPagination;


    protected $listeners = ['refreshStudentGroup' => '$refresh'];

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
        $student_groups = StudentGroup::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.admin.students.groups.manage-student-group',compact('student_groups'));
    }
}
