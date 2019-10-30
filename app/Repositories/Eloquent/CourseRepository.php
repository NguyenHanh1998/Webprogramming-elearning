<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ICourseRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Course;

class CourseRepository extends Repository implements ICourseRepository
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

    public function all($columns = ['*'], $perPage = 10)
    {
        return $this->model->paginate($perPage, $columns);
    }
}