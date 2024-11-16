<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applicationsWithPostAndUser = collect();
        $company = auth()->user()->company;

        if ($company) {
            $postIds = $company->posts()->pluck('id');
            $applicationsWithPostAndUser = JobApplication::whereIn('post_id', $postIds)
                ->with(['user:id,name,email', 'post:id,job_title'])
                ->latest()
                ->paginate(10);
        }

        return view('job-application.index', compact('applicationsWithPostAndUser'));
    }

    public function show($id)
    {
        $application = JobApplication::with(['post.company', 'user'])->findOrFail($id);

        return view('job-application.show', [
            'applicant' => $application->user,
            'post' => $application->post,
            'company' => $application->post->company,
            'application' => $application
        ]);
    }

    public function destroy(Request $request)
    {
        $application = JobApplication::findOrFail($request->application_id);
        $application->delete();

        Alert::toast('Application deleted successfully', 'success');
        return redirect()->route('jobApplication.index');
    }

}
