<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddUser extends Component
{
    public $role;
    public $name;
    public $email;


    protected $rules = [
        'role' => 'required',
        'name' => 'required|max:20',
        'email' => 'required|email|unique:users,email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate([
            'role' => 'required',
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users,email',
        ]);

        $code = rand(0000,9999);
        $user = New User();
        $user->user_type = 'admin';
        $user->role = $this->role;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->code = $code;
        $user->password = Hash::make($code);
        if($user->save()){
            session()->flash('success', 'User Created Successfully Completed.');
        }else{
            session()->flash('error', 'Something Went to Wrong!');
        }
    }

    public function render()
    {
        return view('livewire.admin.users.add-user');
    }
}
