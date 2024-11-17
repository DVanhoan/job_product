<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthorController;
use App\Http\Controllers\CompanyCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\savedJobController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;



Route::get('login/github', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/login/github/callback', function () {
    $github_user = Socialite::driver('github')->stateless()->user();
    $user = User::where("github_id", $github_user->id)->orWhere('email', $github_user->getEmail())->first();

    if ($user) {
        auth()->login($user, true);
    } else {
        $newUser = User::create([
            'name' => $github_user->getNickname(),
            'email' => $github_user->getEmail(),
            'avatar' => $github_user->getAvatar(),
            'github_id' => $github_user->getId(),
            'password' => Hash::make($github_user->getId()),
        ]);
        $newUser->assignRole('user');
        auth()->login($newUser, true);
    }

    return redirect()->route('post.index');
});


Route::get('login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    $google_user = Socialite::driver('google')->stateless()->user();
    $user = User::where("google_id", $google_user->id)->orWhere('email', $google_user->getEmail())->first();


    if ($user) {
        auth()->login($user, true);
    } else {
        $newUser = User::create([
            'name' => $google_user->getName(),
            'email' => $google_user->getEmail(),
            'avatar' => $google_user->getAvatar(),
            'google_id' => $google_user->getId(),
            'password' => Hash::make($google_user->getId()),
        ]);

        $newUser->assignRole('user');

        auth()->login($newUser, true);
    }

    return redirect()->route('post.index');
});


Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/job/{job}', [PostController::class, 'show'])->name('post.show');
Route::get('employer/{id}', [AuthorController::class, 'employer'])->name('account.employer');


Route::get('/search', [JobController::class, 'index'])->name('job.index');
Route::get('job-titles', [JobController::class, 'getAllByTitle'])->name('job.getAllByTitle');
Route::get('companies', [JobController::class, 'getAllOrganization'])->name('job.getAllOrganization');


Route::middleware('auth')->prefix('account')->group(function () {

    Route::post('/update-profile-image', [AccountController::class, 'updateProfile'])->name('account.updateProfileImage');


    Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::get('overview', [AccountController::class, 'index'])->name('account.index');
    Route::get('deactivate', [AccountController::class, 'deactivateView'])->name('account.deactivate');
    Route::get('change-password', [AccountController::class, 'changePasswordView'])->name('account.changePasswordview');
    Route::delete('delete', [AccountController::class, 'deleteAccount'])->name('account.delete');
    Route::put('change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');

    Route::get('my-saved-jobs', [savedJobController::class, 'index'])->name('savedJob.index');
    Route::get('my-saved-jobs/{id}', [savedJobController::class, 'store'])->name('savedJob.store');
    Route::delete('my-saved-jobs/{id}', [savedJobController::class, 'destroy'])->name('savedJob.destroy');

    Route::get('apply-job', [AccountController::class, 'applyJobView'])->name('account.applyJobView');
    Route::post('apply-job', [AccountController::class, 'applyJob'])->name('account.applyJob');


    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('account.dashboard');
        Route::get('view-all-users', [AdminController::class, 'viewAllUsers'])->name('account.viewAllUsers');
        Route::delete('view-all-users', [AdminController::class, 'destroyUser'])->name('account.destroyUser');

        Route::get('category/{category}/edit', [CompanyCategoryController::class, 'edit'])->name('category.edit');
        Route::post('category', [CompanyCategoryController::class, 'store'])->name('category.store');
        Route::put('category/{id}', [CompanyCategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{id}', [CompanyCategoryController::class, 'destroy'])->name('category.destroy');
    });


    Route::group(['middleware' => ['role:author']], function () {
        Route::get('author-section', [AuthorController::class, 'authorSection'])->name('account.authorSection');

        Route::get('job-application/{id}', [JobApplicationController::class, 'show'])->name('jobApplication.show');
        Route::delete('job-application', [JobApplicationController::class, 'destroy'])->name('jobApplication.destroy');
        Route::get('job-application', [JobApplicationController::class, 'index'])->name('jobApplication.index');

        Route::get('post/create', [PostController::class, 'create'])->name('post.create');
        Route::post('post', [PostController::class, 'store'])->name('post.store');
        Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

        Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
        Route::post('company', [CompanyController::class, 'store'])->name('company.store');
        Route::get('company/edit', [CompanyController::class, 'edit'])->name('company.edit');
        Route::delete('company', [CompanyController::class, 'destroy'])->name('company.destroy');
    });


    Route::group(['middleware' => ['role:user']], function () {
        Route::get('become-employer', [AccountController::class, 'becomeEmployerView'])->name('account.becomeEmployer');
        Route::post('become-employer', [AccountController::class, 'becomeEmployer'])->name('account.becomeEmployer');
    });
});
