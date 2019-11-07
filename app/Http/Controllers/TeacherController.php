<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Auth;
class TeacherController extends Controller 
{
    private $_teacherRepository;
    public function __construct(IUserRepository $teacherRepository)
    {
        $this->_teacherRepository = $teacherRepository;
    }

    public function index(Request $request) {
        $user = Auth::user();
        if($user)
       { 
            try { 
                $result = $this->_teacherRepository->getListByRole('1', ['*'], $request['perPage']);
                return response()->json([
                    'status' => true,
                    'data' => $result
                ], Response::HTTP_OK);
            } catch ( Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage()
                ]);
            }
        }
        return response(null, Response::HTTP_BAD_REQUEST);
    }
}
