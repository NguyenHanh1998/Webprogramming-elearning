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

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            try {
                $result = $this->_teacherRepository->getListByRole('1', ['*'], $request['perPage']);
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

    public function statistics(Request $request, $id)
    {
        $user = Auth::user();
        if (!$this->validIdentity(Auth::id(), $id))
            return $this->error('Unauthorized');
        $courses = $user->teacherCourses;
        $courseCount = $courses->count();
        $categoryCount = [];
        $students = 0;
        $votes = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        $income = 0;
        foreach ($courses as $course) {
            $categories = $course->categories;
            foreach ($categories as $category) {
                if (!in_array($category, $categoryCount))
                    array_push($categoryCount, $category);
            }
            $students += $course->courseStudents->count();
            foreach ($course->courseStudents as $student) {
                $income += $course->fee * 0.8;
                foreach ($course->studentCourses as $value) {
                    $votes[$value->vote] += 1;
                    // array_push($votes, $value);
                }
            }
        }

        return response()->json(['data' => [
            'courseCount' => $courseCount,
            'categoryCount' => count($categoryCount),
            'follows' => $students,
            'vote' => $votes,
            'income' => $income 
        ]], Response::HTTP_OK);
    }
}
