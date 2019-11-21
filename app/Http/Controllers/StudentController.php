<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
	private $_studentRepository;
	public function __construct(IUserRepository $studentRepository)
	{
		$this->_studentRepository = $studentRepository;
	}

	public function index(Request $request)
	{
		$user = Auth::user();
		if ($user) {
			try {
				$result = $this->_studentRepository->getListByRole('2', ['*'], $request['perPage']);
				return response()->json([
					'status' => true,
					'data' => $result
				], Response::HTTP_OK);
			} catch (Exception $e) {
				return response()->json([
					'status' => false,
					'message' => $e->getMessage()
				]);
			}
		}

		return response(null, Response::HTTP_BAD_REQUEST);
	}
}
