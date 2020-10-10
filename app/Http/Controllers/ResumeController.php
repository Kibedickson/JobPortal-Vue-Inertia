<?php

namespace App\Http\Controllers;

use App\Resume;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $resumes = Resume::where('user_id', auth()->id())->get();
        return Inertia::render('Candidates/Profiles/index', [
            'resumes' => $resumes
        ]);
    }

    public function create(){
        return Inertia::render('Candidates/create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'age' => 'required',
            'degree' => 'required',
            'field' => 'required',
            'school' => 'required',
            'year' => 'required',
            'skill' => 'required'
        ]);

        $data['user_id'] = auth()->id();

        Resume::create($data);

        return redirect(route('profiles'));

    }
}
