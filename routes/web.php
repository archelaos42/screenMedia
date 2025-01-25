<?php

use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/admin', [PagesController::class, 'admin'])->name('admin');
Route::get('/download', [PagesController::class, 'downloadFiles'])->name('download');
Route::get('/locations', [PagesController::class, 'locations'])->name('locations');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/OOH', [PagesController::class, 'OOH'])->name('OOH');
Route::get('/mediatypes', [PagesController::class, 'mediatypes'])->name('mediatypes');


Route::get('/campaigns/new', [PagesController::class, 'newcampaign'])->name('newcampaign');
Route::post('/campaign/create', [PagesController::class, 'newcampaignpost'])->name('newcampaignpost');

Route::get('/board/new', [PagesController::class, 'newboard'])->name('newboard');
Route::post('/board/create', [PagesController::class, 'newboardpost'])->name('newboardpost');

Route::get('/admin/board/edit/{id}', [PagesController::class, 'boardedit'])->name('boardedit');
Route::post('/board/change', [PagesController::class, 'boardchange'])->name('boardchange');

Route::get('/admin/campaign/edit/{id}', [PagesController::class, 'campaignedit'])->name('campaignedit');
Route::post('/campaign/change', [PagesController::class, 'campaignchange'])->name('campaignchange');

Route::post('/campaign/destroy/{id}', [PagesController::class, 'campaigndestroy'])->name('campaigndestroy');
Route::post('/board/destroy/{id}', [PagesController::class, 'boarddestroy'])->name('boarddestroy');

Route::get('campaigns/populate/{id}', [PagesController::class, 'populate'])->name('populate');
Route::get('/campaign/{id}', [PagesController::class, 'pubcampaign'])->name('pubcampaign');

Route::post('campaigns/add', [PagesController::class, 'add'])->name('add');

Route::post('campaigns/remove', [PagesController::class, 'remove'])->name('remove');

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/cms', [PagesController::class, 'cms'])->name('cms');
    Route::get('/admin/boards', [PagesController::class, 'boards'])->name('boards');
    Route::get('/admin/archived', [PagesController::class, 'archived'])->name('archived');
    Route::get('/admin/campaigns', [PagesController::class, 'campaigns'])->name('campaigns');
    Route::post('/admin/campaigns/archive', [PagesController::class, 'archive'])->name('archive');
    Route::post('/admin/campaigns/activate', [PagesController::class, 'activate'])->name('activate');
    Route::get('/admin/campaign/{id}', [PagesController::class, 'campaign'])->name('campaign');
    Route::post('/admin/image/remove/{id}', [PagesController::class, 'imageremove'])->name('imageremove');
});
