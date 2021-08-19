<?php

namespace App\Http\Livewire\Admin\Students\FeeCategory;

use App\Models\Students\StudentFeeCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ManageStudentFeeCategory extends Component
{
    use WithPagination;


    protected $listeners = ['refreshStudentFeeCategory' => '$refresh'];

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
        $student_fee_categories = StudentFeeCategory::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
         return view('livewire.admin.students.fee-category.manage-student-fee-category',compact('student_fee_categories'));
    }
}
