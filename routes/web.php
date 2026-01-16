<?php

use App\Livewire\AboutUs;
use App\Livewire\Admin\Dashboard;
use App\Livewire\ContactUs;
use App\Livewire\Home;
use App\Livewire\Services\StrategyConsulting;
use App\Livewire\ServicesOverview;
use App\Livewire\Admin\Projects\ProjectDetail;
use App\Livewire\Admin\Projects\ProjectDetailView;
use App\Livewire\Work;
use App\Livewire\ServiceDetail;
use Illuminate\Support\Facades\Route;
use App\Livewire\WorkDetail;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', Home::class)->name('home');
Route::get('/about-us', AboutUs::class)->name('about');
Route::get('/work', Work::class)->name('work');
Route::get('/contact-us', ContactUs::class)->name('contact');
Route::get('/work/{slug}', WorkDetail::class)->name('work.detail');





/*
|--------------------------------------------------------------------------
| Services Pages
|--------------------------------------------------------------------------
*/

Route::prefix('services')->name('services.')->group(function () {

    // Services Listing (Categories + Services)
    Route::get('/', ServicesOverview::class)->name('index');

    // Temporary static service
    Route::get('/strategy-consulting', StrategyConsulting::class)
        ->name('strategy-consulting');

    // Dynamic service detail page
   Route::get('/{slug}', \App\Livewire\ServiceDetail::class)
        ->name('detail');


   
});

/*
|--------------------------------------------------------------------------
| Admin Login (Hidden Entry)
|--------------------------------------------------------------------------
*/

Route::view('/ignite', 'auth.ignite')
    ->middleware(['guest', 'throttle:5,1'])
    ->name('admin.login');

/*
|--------------------------------------------------------------------------
| Security – Block obvious admin URL
|--------------------------------------------------------------------------
*/

Route::get('/admin', fn () => abort(404));

/*
|--------------------------------------------------------------------------
| Admin Panel (Console)
|--------------------------------------------------------------------------
*/

Route::prefix('console')
    ->middleware(['auth']) // 👉 later: auth:admin
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        // Services list
        Route::get('/services', \App\Livewire\Admin\Services\ServicesList::class)
            ->name('services');

        // Categories
        Route::get('/services/categories', \App\Livewire\Admin\Services\ServiceCategories::class)
            ->name('service.categories');

        // Create service
        Route::get('/services/create', \App\Livewire\Admin\Services\ServiceCreate::class)
            ->name('services.create'); // Edit service ✅
        Route::get(
            '/services/{id}/edit',
            \App\Livewire\Admin\Services\ServiceEdit::class
        )->name('services.edit');

        Route::get(
            '/services/category/{category:slug}',
            \App\Livewire\Admin\Services\CategoryView::class
        )->name('services.category.view');

        // Projects / Works
        Route::get(
            '/projects',
            \App\Livewire\Admin\Projects\ProjectsList::class
        )->name('projects');

        Route::get(
    '/projects/{id}/edit',
    \App\Livewire\Admin\Projects\ProjectEdit::class
)->name('projects.edit');


        Route::get(
            '/projects/create',
            \App\Livewire\Admin\Projects\ProjectCreate::class
        )->name('projects.create');



// ================= PROJECT DETAILS (INSIDE PAGE CMS) =================

// CMS (Create / Edit)
// ✅ LIST / VIEW ALL (Sidebar page)
Route::get(
    '/projects-details',
    ProjectDetailView::class
)->name('projects.details.view');

// ✅ ADD / EDIT FORM
Route::get(
    '/projects-details/edit/{project_id?}',
    ProjectDetail::class
)->name('projects.details.edit');


        Route::post('/logout', function () {
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect('/ignite');
        })->name('logout');
    });

/*
|--------------------------------------------------------------------------
| Laravel default login redirect safety
|--------------------------------------------------------------------------
*/

Route::view('/login', 'auth.ignite')->name('login');