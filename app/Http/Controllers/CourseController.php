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

    public function store(Request $request, $user_id)
    {
        $params = $request->only(
            'name',
            'fee',
            'ava',
            'cover',
            'description',
            'requirement',
            'learnable'
        );
        // return response()->json(['data' => $params]);
        try {
            $this->_courseRepository->create($user_id, $params);
            return response()->json(['data' => 'done'], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Create error' . $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function enrolledStudent(Request $request, $user_id, $id)
    {
        return response()->json(['data' => [
            'enrolled' => $this->_courseRepository->get($id)->courseStudents->count()
        ]], 200);
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
