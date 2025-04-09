<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\ProvinceService;

class PostController extends Controller
{
    private $provinceService;
    public function __construct(ProvinceService $provinceService)
    {
        $this->provinceService = $provinceService;
    }
    public function index()
    {
        $posts = Post::has('company')->with('company')->orderBy('views', 'desc')->paginate(12);
        $categories = CompanyCategory::select('id', 'category_name')->take(5)->get();
        $topEmployers = Company::select('id', 'title', 'logo')->latest()->take(6)->get();
        return view('home')->with([
            'posts' => $posts,
            'categories' => $categories,
            'topEmployers' => $topEmployers
        ]);
    }
    public function getProvinces()
    {
        $dataObject = $this->provinceService->getProvinces();
        return array_map(function ($data) {
            return (object) [
                'id' => $data['code'],
                'name' => $data['name'],
                'type' => $data['division_type']
            ];
        }, $dataObject['results']);
    }
    public function create()
    {
        $provinces = $this->getProvinces();
        if (!auth()->user()->company) {
            Alert::info('You must create a company first!', 'info');
            return redirect()->route('company.create');
        }
        return view('post.create', compact('provinces'));
    }
    public function store(Request $request)
    {
        $this->requestValidate($request);
        $postData = $request->all();
        $postData['company_id'] = auth()->user()->company->id;
        $post = Post::create($postData);
        if ($post) {
            Alert::success('Created Post!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::warning('Post failed to list!', 'warning');
        return redirect()->back();
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        event(new PostViewEvent($post));
        $company = $post->company()->first();
        $similarPosts = Post::whereHas('company', function ($query) use ($company) {
            return $query->where('company_category_id', $company->company_category_id);
        })->where('id', '<>', $post->id)->with('company')->take(5)->get();
        return view('post.show')->with([
            'post' => $post,
            'company' => $company,
            'similarJobs' => $similarPosts
        ]);
    }
    public function edit(Post $post)
    {
        $provinces = $this->getProvinces();
        return view('post.edit', compact('post', 'provinces'));
    }
    public function update(Request $request, $post)
    {
        $this->requestValidate($request);
        $getPost = Post::findOrFail($post);
        if ($getPost->update($request->all())) {
            Alert::success('Post successfully updated!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::error('Failed to update post!', 'error');
        return redirect()->route('post.index');
    }
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            Alert::success('Post successfully deleted!', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->back();
    }
    protected function requestValidate($request)
    {
        return $request->validate([
            'job_title' => 'required|string|min:3',
            'job_level' => 'required|string',
            'vacancy_count' => 'required|numeric',
            'employment_type' => 'required|string',
            'job_location' => 'required|string',
            'salary' => 'required|numeric',
            'deadline' => 'required|date',
            'education_level' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'specifications' => 'nullable|string|min:5',
        ]);
    }
}
