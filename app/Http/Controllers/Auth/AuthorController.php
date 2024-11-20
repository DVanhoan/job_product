<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobApplication;
use Carbon\Carbon;

class AuthorController extends Controller
{
    /** Author dashboard */
    public function authorSection()
    {
        $livePosts = null;
        $company = null;
        $applications = null;

        if ($this->hasCompany()) {
            $company = auth()->user()->company;
            $posts = $company->posts()->paginate(10);

            if ($company->posts->count()) {
                $livePosts = $posts->where('deadline', '>', Carbon::now())->count();
                $ids = $posts->pluck('id');
                $applications = JobApplication::whereIn('post_id', $ids)->get();
            }
        }
        return view('account.author-section')->with([
            'company' => $company,
            'applications' => $applications,
            'livePosts' => $livePosts,
            'posts' => $posts
        ]);
    }

    public function employer($id)
    {
        $company = Company::with('posts')->find($id);

        if (!$company) {
            // Nếu không tìm thấy công ty với ID này, có thể trả về 404 hoặc xử lý lỗi khác
            abort(404, 'Company not found');
        }

        return view('account.employer')->with([
            'company' => $company,
        ]);
    }


    //check if has company
    protected function hasCompany()
    {
        return auth()->user()->company ? true : false;
    }
}