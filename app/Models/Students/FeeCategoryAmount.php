<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    protected $table = 'fee_category_amounts';

    protected $fillable = ['studnet_fee_category_id','student_class_id','amount'];

    /**
     * Get the studentFeeCategory that owns the FeeCategoryAmount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentFeeCategory()
    {
        return $this->belongsTo(StudentFeeCategory::class, 'student_fee_category_id');
    }

    /**
     * Get the studentClass that owns the FeeCategoryAmount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id');
    }
}
