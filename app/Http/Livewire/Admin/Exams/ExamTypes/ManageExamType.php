<?php

namespace App\Http\Livewire\Admin\Exams\ExamTypes;

use App\Models\Admin\ExamType;
use Livewire\Component;
use Livewire\WithPagination;

class ManageExamType extends Component
{
    use WithPagination;


    protected $listeners = ['refreshExamType' => '$refresh'];

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
        $exam_types = ExamType::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.admin.exams.exam-types.manage-exam-type',compact('exam_types'));
    }
}
