<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\ProvinceService;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    private $provinceService;

    public function __construct(ProvinceService $provinceService)
    {
        $this->provinceService = $provinceService;
    }

    public function index(Request $request)
    {
        $categories = Cache::remember('categories', 3600, function () {
            return CompanyCategory::all();
        });

        $provinces = $this->getProvinces();

        $posts = Post::query()
            ->with('company') // Eager Loading để giảm số query
            ->when($request->q, function ($query, $q) {
                return $query->where(function ($qBuilder) use ($q) {
                    $qBuilder->where('job_title', 'LIKE', "%$q%")
                        ->orWhere('skills', 'LIKE', "%$q%");
                });
            })
            ->when($request->category_id, function ($query, $categoryId) {
                return $query->whereHas('company', function ($companyQuery) use ($categoryId) {
                    $companyQuery->where('company_category_id', $categoryId);
                });
            })
            ->when($request->job_level, fn($query, $jobLevel) => $query->where('job_level', 'LIKE', "%$jobLevel%"))
            ->when($request->education_level, fn($query, $eduLevel) => $query->where('education_level', 'LIKE', "%$eduLevel%"))
            ->when($request->employment_type, fn($query, $empType) => $query->where('employment_type', 'LIKE', "%$empType%"))
            ->when($request->job_location, fn($query, $location) => $query->where('job_location', 'LIKE', "%$location%"))
            ->has('company')
            ->orderBy('views', 'desc')
            ->paginate(6);

        return view('job.index', compact('posts', 'categories', 'provinces'));
    }

    public function getProvinces()
    {

        $dataObject = Cache::remember('provinces', 86400, function () {
            return $this->provinceService->getProvinces();
        });


        if (!$dataObject || empty($dataObject['results'])) {
            return [];
        }


        $provinces = collect($dataObject['results'])->map(function ($item) {
            return (object) [
                'id' => $item['province_id'],
                'name' => $item['province_name'],
                'type' => $item['province_type']
            ];
        })->all();

        return $provinces;
    }

    public function getAllOrganization()
    {

        $companies = Cache::remember('all_companies', 3600, function () {
            return Company::all();
        });

        return response()->json($companies);
    }

    public function getAllByTitle()
    {

        $posts = Post::where('deadline', '>', now())
            ->get(['id', 'job_title'])
            ->pluck('id', 'job_title');

        return response()->json($posts);
    }
}
