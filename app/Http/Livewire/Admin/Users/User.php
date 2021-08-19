<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class User extends Component
{
    public $status = true;

    public function render()
    {
        return view('livewire.admin.users.user')->extends('layouts.admin.app');
    }
}
