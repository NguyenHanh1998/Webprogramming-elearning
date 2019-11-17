<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'fee', 'cover', 'ava', 'description', 'requirement', 'learnable', 'user_id'
    ];

    public function courseStudents()
    {
        return $this->hasManyThrough(
        'App\Models\User', 'App\Models\StudentCourse',
        'course_id', 'id', 'id');
    }

    public function categories()
    {
        return $this->hasManyThrough(
            'App\Models\Category', 'App\Models\CourseCategory',
            'course_id', 'id', 'id'
        );
    }
}
