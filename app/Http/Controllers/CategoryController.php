<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ICategoryRepository;
use Exception;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
	private $_categoryRepository;
	public function __construct(ICategoryRepository $categoryRepository)
	{
		$this->_categoryRepository = $categoryRepository;
	}

	public function update(Request $request, $id)
	{
		$updateDetails = [
			'name' => $request->get('name'),
			'description' => $request->get('description')
		];


		try {
			$result = $this->_categoryRepository->update($id, $updateDetails);
			if ($result == null) {
				return response()->json([
					'error' => ['message' => 'Cannot find category with id: ' . $id]
				], Response::HTTP_NOT_FOUND);
			} else {
				return "true";
			}
		} catch (Exception $e) {
			return response()->json([
				'error' => [
					'message' => 'Create error',
					'internal_message' => $e->getMessage()
				]
			], Response::HTTP_BAD_REQUEST);
		}
	}
}
