<?php

namespace App\Http\Controllers;

use App\Job;
use App\Proposal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, Job $job){
        $data = $request->validate([
            'candidate_id' => 'required',
        ]);
        $job->update($data);
        $job->load(['candidate','proposals', 'proposals.candidate']);

        $notification = array(
            'message' => 'Job Applied Successfully!',
            'alert-type' => 'success'
        );

        return Inertia::render('Employers/show', [
            'job' => $job,
        ])->with($notification);
    }

    public function destroy(Job $job){
        
        $proposal = Proposal::where('job_id', $job->id)->where('candidate_id', auth()->id());
        $proposal->delete();

        $data = [
            'candidate_id' => null
        ];

        Job::where('id', $job->id)->update($data);

        return redirect(route('jobs'));
    }

    public function store(Job $job){
        
        $data = [
            'job_id' => $job->id,
            'candidate_id' => auth()->id()
        ];

        Proposal::create($data);

        return redirect(route('jobs'));

    }
}
