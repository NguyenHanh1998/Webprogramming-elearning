<?php

namespace App\Http\Controllers;

// use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ICourseRepository;
use App\Repositories\Interfaces\IUserRepository;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    private $_courseRepository;
    private $_userRepository;
    public function __construct(ICourseRepository $courseRepository, IUserRepository $userRepository)
    {
        $this->_courseRepository = $courseRepository;
        $this->_userRepository = $userRepository;
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

    public function userCourses(Request $request, $user_id)
    {
        $tokenId = Auth::id();
        if(!$this->validIdentity($tokenId, $user_id))
            return $this->error('Unauthorized');
        $courses = $this->_userRepository->getMyCourseList($user_id);
        return response()->json(['data' => [
                'courses' => $courses,
            ]
        ]);
    }
}
