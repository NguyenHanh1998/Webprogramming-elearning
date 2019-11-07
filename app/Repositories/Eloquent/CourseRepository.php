<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ICourseRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Course;
use Exception;

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

    public function create($params)
    {
        /* xu li upload anh */
        if (!$params['ava'])
            $params['ava'] = "https://via.placeholder.com/100x100";
        if (!$params['cover'])
            $params['cover'] = "https://via.placeholder.com/100x100";
        $this->model = new Course($params);
        try {
            $this->model->save();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
