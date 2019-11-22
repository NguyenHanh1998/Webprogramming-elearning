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
				$result = $this->_studentRepository->getListByRole('1', ['*'], $request['perPage']);
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

	public function destroy(Request $request, $id)
	{
		$user = Auth::user();
		if (!$user)
			return $this->error('Unauthorized');

		try {
			$result = $this->_studentRepository->destroy($id, '1');
			if ($result == null) {
				return response()->json([
					'error' => ['message' => 'Cannot find student with id: ' . $id]
				], Response::HTTP_NOT_FOUND);
			} else if ($result == 'false') {
				return response()->json([
					'error' => ['message' => 'Id ' . $id . ' is not for student']
				], Response::HTTP_BAD_REQUEST);
			} else {
				return 'true';
			}
		} catch (Exeption $e) {
			return response()->json([
				'error' => [
					'message' => 'Update error',
					'internal_message' => $e->getMessage()
				]
			], Response::HTTP_BAD_REQUEST);
		}
	}
}
