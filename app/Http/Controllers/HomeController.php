<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\Teacher;
use App\Models\Discover;
use App\Models\Testimonial;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     *
     *
     * Show all Info for index page
     *
     *
     */

    public function index()
    {
        $discovers = Discover::all();
        $gallery = Gallery::all();
        $services = Service::all();
        $studentClass = StudentClass::all();
        $teacher = Teacher::all();
        $testimonial = Testimonial::all();

        return view('index', compact('discovers', 'gallery', 'services', 'studentClass', 'teacher', 'testimonial'));
    }
}
