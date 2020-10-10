<?php

namespace App\Http\Controllers;

use App\Job;
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
}
