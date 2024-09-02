<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function students()
    {
        //return $this->belongsToMany(Student::class);

        return $this->belongsToMany(Student::class, 'student_subject')
                    ->withPivot('note');
    }
}
