<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return Inertia::render('Candidates/index', [
            'jobs' => Job::all(),
        ]);
    }

}
