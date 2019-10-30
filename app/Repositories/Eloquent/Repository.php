<?php

namespace App\Repositories\Eloquent;

class Repository
{
    /**
     * Eloquent
     */
    protected $model;

    /**
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function paginate($columns = ['*'], $per=10)
    {
        return $this->model->paginate($per, $columns);
    }
}