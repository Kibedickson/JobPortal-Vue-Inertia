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
        if (auth()->user()->isCandidate()) {
            return Inertia::render('Candidates/index', [
                'jobs' => Job::all(),
            ]);
        }elseif (auth()->user()->isEmployer()){
            return Inertia::render('Employers/index', [
                'jobs' => Job::with('proposals')->where('employer_id', auth()->id())->get(),
            ]);
        }
    }

}
