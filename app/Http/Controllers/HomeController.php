<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = auth()->user()->courses()->selectRaw('
        (SELECT 
            lesson_id
        FROM
            `lesson_user`
        WHERE
            lesson_id IN (SELECT 
                    `lessons`.`id`
                FROM
                    `lessons`
                WHERE
                    `lessons`.`course_id` = `course_user`.`course_id`)
                AND `lesson_user`.`user_id` = `course_user`.`user_id`
        ORDER BY lesson_id DESC
        LIMIT 1) AS last_completed_lesson_id')->get();

        return view('home');
    }
}
