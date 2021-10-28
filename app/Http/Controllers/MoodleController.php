<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class MoodleController extends Controller
{
    public function getToken()
    {
        $response = Http::get('http://localhost/moodle/login/token.php', [
            'username' => 'superadmin',
            'password' => '@Dmin123',
            'service' => 'moodle_mobile_app',
        ]);
        return $response;
    }

    public function getCourse()
    {
        $response = Http::get('http://localhost/moodle/webservice/rest/server.php', [
            'wstoken' => '27282023f60d4910c7171b45c0426ea5',
            'wsfunction' => 'core_course_get_courses_by_field',
            'moodlewsrestformat' => 'json',
        ]);

        $list_data = $response['courses'];
        $title = [
            'title' => 'Home'
        ];

        return view('home', compact(['list_data', 'title']));
    }

    public function getCourseId()
    {
        $response = Http::get('http://localhost/moodle/webservice/rest/server.php', [
            'wstoken' => '27282023f60d4910c7171b45c0426ea5',
            'wsfunction' => 'core_course_get_courses_by_field',
            'moodlewsrestformat' => 'json',
            'field' => 'id',
            'value' => '1'
        ]);

        $list_data = $response['courses'];
        return $list_data;
    }
}
