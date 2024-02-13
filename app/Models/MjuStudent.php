<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MjuStudent extends Model
{
    // Relation กับ Model "Major"\
    use HasFactory;
     protected $primaryKey = 'student_code';
     protected $table = 'mju_students';

     public function major()
    {

        return $this->belongsTo(Major::class, 'major_id');
    }
    protected $fillable = [
        'student_code',
        'first_name',
        'first_name_en',
        'major_id',
        'idcard',
        'gender',
        'birthdate',
        'address',
        'phone',
        'email',
    ];

}
