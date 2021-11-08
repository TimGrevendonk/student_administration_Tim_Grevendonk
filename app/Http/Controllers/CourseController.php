<?php

namespace App\Http\Controllers;

use App\Course;
use App\Programme;
use Json;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request) {
        $programme_id = $request->input("programme_id") ?? "%";
        $course_name = "%" . $request->input("course") . "%";

        $courses = Course::with("programme")
            ->where([
                ["programme_id", "like", $programme_id],
                ["name", "like", $course_name]
            ])
            ->orWhere([
                ["programme_id", "like", $programme_id],
                ["description", "like", $course_name]
            ])
            ->orderBY('name')
            ->get()
            ->makeHidden(["created_at", "updated_at"]);

        $order = programme::orderBy('id')->get();
        $programmes = programme::orderBy('name')
            ->has('courses')
            ->withcount('courses')
            ->get()
            ->transform(function ($item, $key) {
               $item->name = strtoupper($item->name);
               return $item;
            });

        foreach ($courses as $course) {
            $course->programme->name = strtoupper($course->programme->name);
        }

        $result = compact('courses', 'programmes', 'order');
        Json::dump($result);
        return view("courses.index", $result);
    }

    // details page (.../courses/{id})
    public function show($id) {
        // goes to page and sends id to the view
        return view("courses.show", ["id" => $id]);
    }
}
