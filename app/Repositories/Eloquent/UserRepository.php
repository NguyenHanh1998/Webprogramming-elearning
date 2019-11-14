<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Interfaces\IUserRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Models\User;
use Exception;

class UserRepository extends Repository implements IUserRepository
{
    public function __construct(User $model)
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

    public function getListByRole($role, $columns = ['*'], $perPage = 10) {
        return $this->model->where('role', $role)->paginate($perPage, $columns);
    }

    public function getMyCourseList($user_id)
    {
        $user = $this->model->find($user_id);
        if($user->role == 1)
            return $user->studentCourses;
        else if($user->role == 2)
            return $user->teacherCourses;
    }
}
