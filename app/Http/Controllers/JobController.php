<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query();
        $categories = CompanyCategory::all();

        if ($request->q) {
            $posts = $posts->where('job_title', 'LIKE', '%' . $request->q . '%');
        }
        if ($request->category_id) {
            $posts = $posts->whereHas('company', function ($query) use ($request) {
                $query->where('company_category_id', $request->category_id);
            });
        }
        if ($request->job_level) {
            $posts = $posts->where('job_level', 'LIKE', '%' . $request->job_level . '%');
        }
        if ($request->education_level) {
            $posts = $posts->where('education_level', 'LIKE', '%' . $request->education_level . '%');
        }
        if ($request->employment_type) {
            $posts = $posts->where('employment_type', 'LIKE', '%' . $request->employment_type . '%');
        }
        if ($request->job_location) {
            $posts = $posts->where('job_location', 'LIKE', '%' . $request->job_location . '%');
        }

        $posts = $posts->has('company')->with('company')->paginate(6);

        return view('job.index', compact('posts', 'categories'));
    }

    public function getCategories()
    {
        $categories = CompanyCategory::all();
        return view('job.index', compact('categories'));
    }
    public function getAllOrganization()
    {
        $companies = Company::all();
        return $companies->toJson();
    }
    public function getAllByTitle()
    {
        $posts = Post::where('deadline', '>', Carbon::now())->get()->pluck('id', 'job_title');
        return $posts->toJson();
    }
}
