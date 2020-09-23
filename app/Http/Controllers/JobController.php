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
    public function create(){

        return Inertia::render('Employers/create');

    }
    public function store(Request $request){

        $data = $request->validate([

            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'category' => 'required',
            'deadline' => 'required',
        ]);

        $data['employer_id'] = auth()->id();

        Job::create($data);

        return redirect(route('jobs'));

    }
    public function edit(Job $job){
        return Inertia::render('Employers/edit', [
            'job' => $job
        ]);
    }
    public function update(Request $request, Job $job){
        $data = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'category' => 'required',
            'deadline' => 'required',
        ]);

        $data['employer_id'] = auth()->id();

        $job->slug = null;

        $job->update($data);

        return redirect(route('jobs'));
    }

    public function destroy(Job $job){
        $job->delete();

        return redirect(route('jobs'));
    }

}
