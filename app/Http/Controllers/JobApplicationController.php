<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applicationsWithPostAndUser = null;
        $company = auth()->user()->company;

        if ($company) {
            $ids =  $company->posts()->pluck('id');
            $applications = JobApplication::whereIn('post_id', $ids);
            $applicationsWithPostAndUser = $applications->with('user', 'post')->latest()->paginate(10);
        }

        return view('job-application.index')->with([
            'applications' => $applicationsWithPostAndUser,
        ]);
    }
    public function show($id)
    {
        $application = JobApplication::find($id);

        $post = $application->post()->first();
        $userId = $application->user_id;
        $applicant = User::find($userId);

        $company = $post->company()->first();
        return view('job-application.show')->with([
            'applicant' => $applicant,
            'post' => $post,
            'company' => $company,
            'application' => $application
        ]);
    }

    public function accept($id)
    {
        $application = JobApplication::find($id);
        $application->status = 'accepted';
        $application->save();

        $post = $application->post;
        $seeker = User::find($application->user_id);

        Notification::create([
            'title' => "Application Accepted",
            'body' => "Your application to {$post->title} has been accepted",
            'user_id' => $seeker->id,
        ]);


        Alert::toast('Application accepted', 'success');
        return redirect()->route('jobApplication.index');
    }

    public function decline($id)
    {
        $application = JobApplication::find($id);
        $application->status = 'declined';
        $application->save();

        $post = $application->post;
        $seeker = User::find($application->user_id);

        Notification::create([
            'title' => "Application Declined",
            'body' => "Your application to {$post->title} has been declined",
            'user_id' => $seeker->id,
        ]);
        Alert::toast('Application declined', 'warning');
        return redirect()->route('jobApplication.index');
    }

    public function destroy(Request $request)
    {
        $application = JobApplication::find($request->application_id);
        $application->delete();
        Alert::toast('Company deleleted', 'warning');
        return redirect()->route('jobApplication.index');
    }
}
