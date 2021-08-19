<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUser extends Component
{
    use WithPagination;

    public $per_page = 10;
    public $search;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')
                       ->orWhere('email', 'like', '%' . $this->search . '%')
                       ->orWhere('user_type', 'like', '%' . $this->search . '%')->paginate($this->per_page);

        return view('livewire.admin.users.manage-user',compact('users'));
    }
}
