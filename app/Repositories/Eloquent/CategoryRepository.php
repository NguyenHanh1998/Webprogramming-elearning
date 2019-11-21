<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ICategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Category;
use Exception;

class CategoryRepository extends Repository implements ICategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function update($id, $updateDetails)
    {
        $category = Category::find($id);
        if ($category == null) {
            return null;
        } else {
            $this->model->where('id', $id)
                ->update($updateDetails);

            return $this->model->find($id);
        }
    }
}
