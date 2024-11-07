<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Requests\CompanyRequest;

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
            Alert::warning('You already have a company!', 'info');
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
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        if ($this->companySave($company, $request)) {
            Alert::success('Company created! Now you can add posts.', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::error('Failed!', 'error');
        return redirect()->route('account.authorSection');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        if ($user->hasRole('author') && $user->can('edit-company')) {
            $company = auth()->user()->company;
            $categories = CompanyCategory::all();
            return response()->view('company.edit', compact('company', 'categories'));
        } else {
            Alert::error('You don\'t have permission to edit company!', 'error');
        }
    }


    public function update(CompanyRequest $request)
    {
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
            $company->cover_img = 'nocover';

            $company->save();

            Alert::success('Updated!', 'success');
            return redirect()->route('account.authorSection');
        } catch (\Exception $e) {
            Alert::error('Failed!', 'error');
            return redirect()->route('account.authorSection');
        }
    }

    protected function companySave(Company $company, Request $request)
    {
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->company_category_id = $request->category;
        $company->website = $request->website;

        //logo
        $fileNameToStore = $this->getFileName($request->file('logo'));
        $logoPath = $request->file('logo')->storeAs('public/companies/logos', $fileNameToStore);
        if ($company->logo) {
            Storage::delete('public/companies/logos/' . basename($company->logo));
        }
        $company->logo = 'storage/companies/logos/' . $fileNameToStore;

        //cover image
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/companies/cover', $fileNameToStore);
            if ($company->cover_img) {
                Storage::delete('public/companies/cover/' . basename($company->cover_img));
            }
            $company->cover_img = 'storage/companies/cover/' . $fileNameToStore;
        } else {
            $company->cover_img = 'nocover';
        }

        if ($company->save()) {
            return true;
        }
        return false;
    }

    protected function companyUpdate(Company $company, Request $request)
    {
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->company_category_id = $request->category;
        $company->website = $request->website;

        if ($request->hasFile('logo')) {
            $uploadedFileUrl = Cloudinary::uploadFile($request->file('logo')->getRealPath())->getSecurePath();
            $company->logo = $uploadedFileUrl;
        }

        if ($request->hasFile('cover_img')) {
            $uploadedFileUrl = Cloudinary::uploadFile($request->file('cover_img')->getRealPath())->getSecurePath();
            $company->cover_img = $uploadedFileUrl;
        }
        $company->cover_img = 'nocover';
        if ($company->save()) {
            return true;
        }
        return false;
    }
    protected function getFileName($file)
    {
        $fileName = $file->getClientOriginalName();
        $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        return $actualFileName . time() . '.' . $fileExtension;
    }

    public function destroy()
    {
        Storage::delete('public/companies/logos/' . basename(auth()->user()->company->logo));
        if (auth()->user()->company->delete()) {
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('account.authorSection');
    }
}
