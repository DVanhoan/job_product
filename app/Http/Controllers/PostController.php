<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\ProvinceService;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    private $provinceService;

    public function __construct(ProvinceService $provinceService)
    {
        $this->provinceService = $provinceService;
    }
    public function index()
    {
        $posts = Post::latest()->take(20)->with('company')->get();
        $categories = CompanyCategory::take(5)->get();
        $topEmployers = Company::latest()->take(3)->get();
        return view('home')->with([
            'posts' => $posts,
            'categories' => $categories,
            'topEmployers' => $topEmployers
        ]);
    }


    public function getProvinces()
    {
        $dataObject = $this->provinceService->getProvinces();
        $provinces = collect($dataObject['results'])->map(function ($dataObject) {
            return (object) [
                'id' => $dataObject['province_id'],
                'name' => $dataObject['province_name'],
                'type' => $dataObject['province_type']
            ];
        })->all();
        return $provinces;
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

    public function store(PostRequest $request)
    {
        $postData = array_merge(['company_id' => auth()->user()->company->id], $request->all());

        $post = Post::create($postData);
        if ($post) {
            Alert::success('Post listed!', 'success');
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

    public function update(PostRequest $request, $post)
    {
        $getPost = Post::findOrFail($post);

        $newPost = $getPost->update($request->all());
        if ($newPost) {
            Alert::success('Post successfully updated!', 'success');
            return redirect()->route('account.authorSection');
        }
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
}
