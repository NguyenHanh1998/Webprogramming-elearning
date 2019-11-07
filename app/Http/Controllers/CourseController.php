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
                'data' => $result
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => 'Error on fetching',
                    'interal_message' => $e->getMessage()
                ]
            ]);
        }
    }

    public function store(Request $request)
    {
        $params = $request->only(
            'name',
            'fee',
            'cover',
            'ava',
            'description',
            'requirement',
            'learnable'
        );
        try {
            $this->_courseRepository->create($params);
            return response('', Response::HTTP_NO_CONTENT);
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
