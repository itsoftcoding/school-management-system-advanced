<?php

namespace App\Http\Livewire\Admin\Subjects;

use App\Models\Admin\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class ManageSubject extends Component
{
    use WithPagination;


    protected $listeners = ['refreshSubject' => '$refresh'];

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
        $subjects = Subject::where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);

        return view('livewire.admin.subjects.manage-subject',compact('subjects'));
    }
}
