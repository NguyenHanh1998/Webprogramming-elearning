<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ICourseRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Course;
use App\Models\User;
use Exception;
use JD\Cloudder\Facades\Cloudder;

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

    public function create($teacher_id, $params)
    {
        $teacher = User::find($teacher_id);
        try {
            $teacher->teacherCourses()->create($this->validateParams($params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    protected function validateParams($params)
    {
        // upload file
        $params['description'] = json_encode($params['description']);
        $params['requirement'] = json_encode($params['requirement']);
        $params['learnable'] = json_encode($params['learnable']);

        return $this->uploadImage($params);
    }

    protected function uploadImage($params)
    {
        try {
            Cloudder::upload($params['ava']);
            $result = Cloudder::getResult();
            $params['ava'] = $result['url'];
            Cloudder::upload($params['cover']);
            $result = Cloudder::getResult();
            $params['ava'] = $result['url'];      
        } catch (Exception $e) {
            throw $e;
        }

        return $params;
    }
}
