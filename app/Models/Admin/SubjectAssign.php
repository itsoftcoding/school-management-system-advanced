<?php

namespace App\Models\Admin;

use App\Models\Students\StudentClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAssign extends Model
{
    use HasFactory;

    protected $table = 'subject_assigns';

    protected $fillable = ['student_class_id','subject_id','subject_code','full_mark','pass_mark','subjective_mark'];

    /**
     * Get the studentClass that owns the SubjectAssign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id');
    }


    /**
     * Get the subject that owns the SubjectAssign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
