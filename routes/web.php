<?php

    use App\Http\Controllers\Categories\CategoriesController;
    use App\Http\Controllers\CKeditor\CKeditorController;
    use App\Http\Controllers\Content\ContentController;
    use App\Http\Controllers\Home\HomeController;
    use App\Http\Controllers\ImagesController\ImagesController;
    use App\Http\Controllers\NewsController\NewsController;
    use App\Http\Controllers\SliderController\SliderController;
    use App\Http\Controllers\SubCategories\SubCategories;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

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

    Auth::routes();

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/admin', function () {
        return redirect()->route('dashboard');
    })->middleware('auth');

    Route::prefix('dashboard')->middleware(['auth'])->group(function () {
        Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
        //categories
        Route::resource('categories', CategoriesController::class,);
        Route::get('categories/publish-unpublish-category', [CategoriesController::class, 'publish'])->name('publish-unpublish-category');
        //Content
        Route::prefix('content')->group(function () {
            Route::get('/', [ContentController::class, 'index'])->name('content');
            Route::get('/create', [ContentController::class, 'create'])->name('content.create');
            Route::post('/store', [ContentController::class, 'store'])->name('content.store');
            Route::get('/delete/{id}', [ContentController::class, 'delete'])->name('content.delete');
            Route::get('/edit/{id}', [ContentController::class, 'edit'])->name('content.edit');
            Route::put('/update/{id}', [ContentController::class, 'update'])->name('content.update');
            Route::get('/publish-unpublish-content', [ContentController::class, 'publish'])->name('publish-unpublish-content');
        });

        Route::prefix('slider')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('slider');
            Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
            Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
            Route::get('/publish-unpublish-slider', [SliderController::class, 'publish'])->name('publish-unpublish-slider');
        });

        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('news');
            Route::get('/create', [NewsController::class, 'create'])->name('news.create');
            Route::post('/store', [NewsController::class, 'store'])->name('news.store');
            Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');
            Route::get('/publish-unpublish-slider', [NewsController::class, 'publish'])->name('publish-unpublish-news');
        });

        Route::prefix('images')->group(function () {
            Route::get('/', [ImagesController::class, 'index'])->name('images');
            Route::get('/create', [ImagesController::class, 'create'])->name('images.create');
            Route::post('/store', [ImagesController::class, 'store'])->name('images.store');
            Route::get('/delete/{id}', [ImagesController::class, 'delete'])->name('images.delete');
//        Route::get('/publish-unpublish-slider',[NewsController::class,'publish'])->name('publish-unpublish-news');
        });
    });

//CKeditor
    Route::post('ckeditor/image_upload', [CKeditorController::class, 'upload'])->name('upload');
    Route::resource('editor', CKeditorController::class);

    Route::get('novosti-{news}', [HomeController::class, 'newsSinglePost'])->name('novosti-news');
    Route::get('{title}', [HomeController::class, 'singlePost'])->name('manastir');
