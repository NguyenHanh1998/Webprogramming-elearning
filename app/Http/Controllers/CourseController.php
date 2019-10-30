<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ICourseRepository;
use Exception;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    private $_courseRepository;
    public function __construct(ICourseRepository $courseRepository)
    {
        $this->_courseRepository = $courseRepository;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->_courseRepository->all(['*'], $request['perPage']);
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
}
