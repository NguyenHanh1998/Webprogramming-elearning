<?php

namespace App\Repositories\Interfaces;

interface ICourseRepository
{
    public function all($columns = ['*'], $perPage = 10);

    public function create($params);
}