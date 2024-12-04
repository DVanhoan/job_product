<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CompanyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->company) {
            Alert::info('You already have a company!', 'info');
            return $this->edit();
        }
        $categories = CompanyCategory::all();
        return response()->view('company.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateCompany($request);
        $company = new Company();
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->company_category_id = $request->category;
        $company->website = $request->website;

        try {
            if ($request->hasFile('logo')) {
                $uploadedFileUrl = Cloudinary::uploadFile($request->file('logo')->getRealPath())->getSecurePath();
                $company->logo = $uploadedFileUrl;
            }

            if ($request->hasFile('cover_img')) {
                $uploadedFileUrl = Cloudinary::uploadFile($request->file('cover_img')->getRealPath())->getSecurePath();
                $company->cover_img = $uploadedFileUrl;
            } else {
                $company->cover_img = 'nocover';
            }

            $company->save();

            Alert::success('Company Created!', 'success');
            return redirect()->route('account.authorSection');
        } catch (\Exception $e) {
            Alert::error('Failed to create company!', 'error');
            return redirect()->route('account.authorSection');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $company = auth()->user()->company;
        $categories = CompanyCategory::all();
        return response()->view('company.edit', compact('company', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validateCompanyUpdate($request);

        $company = auth()->user()->company;
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->company_category_id = $request->category;
        $company->website = $request->website;


        try {
            if ($request->hasFile('logo')) {
                $uploadedFileUrl = Cloudinary::uploadFile($request->file('logo')->getRealPath())->getSecurePath();
                $company->logo = $uploadedFileUrl;
            }

            if ($request->hasFile('cover_img')) {
                $uploadedFileUrl = Cloudinary::uploadFile($request->file('cover_img')->getRealPath())->getSecurePath();
                $company->cover_img = $uploadedFileUrl;
            }

            $company->save();

            Alert::success('Company Updated!', 'success');
            return redirect()->route('account.authorSection');
        } catch (\Exception $e) {
            Alert::error('Failed to update company!', 'error');
            return redirect()->route('account.authorSection');
        }
    }

    /**
     * Validate company data.
     */
    protected function validateCompany(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'required|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999|mimes:webp,png,jpg,jpeg,gif,svg'
        ]);
    }

    /**
     * Validate company update data.
     */
    protected function validateCompanyUpdate(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'sometimes|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999|mimes:webp,png,jpg,jpeg,gif,svg'
        ]);
    }


    /**
     * Delete the company.
     */
    public function destroy()
    {
        $company = auth()->user()->company;
        if ($company->delete()) {
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('account.authorSection')->withErrors('Failed to delete company.');
    }
}
