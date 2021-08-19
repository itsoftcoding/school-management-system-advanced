<?php

namespace App\Models\Students;

use App\Models\Admin\SubjectAssign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'student_classes';

    protected $fillable = ['name'];

    /**
     * Get all of the subjectAssigns for the StudentClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subjectAssigns()
    {
        return $this->hasMany(SubjectAssign::class);
    }
}
