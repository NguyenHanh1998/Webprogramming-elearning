<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function all($columns = ['*'], $perPage = 10);

    public function create($params);

    public function getListByRole($role, $columns = ['*'], $perPage = 10);

    public function getMyCourseList($user_id);
}