<?php

namespace App\Repositories\Interfaces;

interface ICourseRepository
{
    public function all($columns = ['*'], $perPage = 10);

    public function create($teacher_id, $params);

    public function get($id);
}