<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CompanyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

            Alert::success('Updated!', 'success');
            return redirect()->route('account.authorSection');
        } catch (\Exception $e) {
            Alert::error('Failed!', 'error');
            return redirect()->route('account.authorSection');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = auth()->user()->company;
        $categories = CompanyCategory::all();
        return response()->view('company.edit', compact('company', 'categories'));
    }


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
            } else {
                $company->cover_img = 'nocover';
            }

            $company->save();

            Alert::success('Updated!', 'success');
            return redirect()->route('account.authorSection');
        } catch (\Exception $e) {
            Alert::error('Failed!', 'error');
            return redirect()->route('account.authorSection');
        }
    }

    protected function validateCompany(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'required|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ]);
    }
    protected function validateCompanyUpdate(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'someiimes|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ]);
    }

    public function destroy()
    {
        if (auth()->user()->company->delete()) {
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('account.authorSection');
    }
}
