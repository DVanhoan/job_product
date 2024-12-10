<?php

namespace App\Http\Controllers;

use App\Models\CompanyCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use App\http\Controllers\ProvinceController;

class JobController extends Controller
{
    private $provinceController;

    public function __construct(ProvinceController $provinceController)
    {
        $this->provinceController = $provinceController;
    }

    public function index(Request $request)
    {
        $categories = CompanyCategory::all();

        $provinces = $this->provinceController->getProvinces();
        // dd($provinces);

        $posts = Post::query();
        if ($request->q) {
            $posts = $posts->where('job_title', 'LIKE', '%' . $request->q . '%')->orWhere('skills', 'LIKE', '%' . $request->q . '%');
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

        $posts = $posts->has('company')->with('company')->orderBy('views', 'desc')->paginate(6);

        return view('job.index', compact('posts', 'categories', 'provinces'));
    }
}