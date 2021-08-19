<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Students\StudentClass;
use App\Models\Students\StudentGroup;
use App\Models\Students\StudentShift;
use App\Models\Students\StudentYear;
use Livewire\Component;

class AddStudent extends Component
{
    public $name;
    public $fname;
    public $mname;
    public $email;
    public $phone;
    public $address;
    public $gender;
    public $dob;
    public $religioin;
    public $year;
    public $class;
    public $group;
    public $shift;
    public $discount;
    public $profile_pic;

    public function save(){

    }


    public function render()
    {
        $student_years = StudentYear::get();
        $student_classes = StudentClass::get();
        $student_groups = StudentGroup::get();
        $student_shifts = StudentShift::get();
        return view('livewire.admin.students.add-student',compact('student_years','student_classes','student_groups','student_shifts'));
    }
}
