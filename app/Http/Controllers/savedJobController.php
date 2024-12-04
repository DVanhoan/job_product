<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class savedJobController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->with('company')->get();
        return view('account.saved-job', compact('posts'));
    }

    public function store($id)
    {
        $user = auth()->user();

        $hasPost = $user->posts()->where('id', $id)->exists();

        if ($hasPost) {
            Alert::toast('You have already saved this job!', 'info');
        } else {
            $user->posts()->attach($id);
            Alert::toast('Job successfully saved!', 'success');
        }

        return redirect()->route('savedJob.index');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        $user->posts()->detach($id);
        Alert::toast('Deleted saved job!', 'success');

        return redirect()->route('savedJob.index');
    }
}
