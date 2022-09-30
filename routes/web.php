<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false ]);

Route::group([

    'prefix' => LaravelLocalization::setLocale(),

    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]

], function(){ 

Route::group(['prefix' => '/','middleware'=>'auth'], function () {
    Route::get('home', [App\Http\Controllers\Dashboard\HomeController::class , 'index'])->name('dashboard');
    Route::get('', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('home');

    // Route::resource('employees', App\Http\Controllers\Dashboard\EmployeesController::class);
    // Route::resource('coaches', App\Http\Controllers\Dashboard\CoachesController::class);

    Route::group(['prefix' => 'employees'],function () {
        Route::get('/', [App\Http\Controllers\Dashboard\EmployeesController::class, 'index'])->name('Employees.index');
        Route::get('/create', [App\Http\Controllers\Dashboard\EmployeesController::class, 'create'])->name('Employees.create');
        Route::post('/store', [App\Http\Controllers\Dashboard\EmployeesController::class, 'store'])->name('Employees.store');
        Route::get('/update/{id}', [App\Http\Controllers\Dashboard\EmployeesController::class, 'update'])->name('Employees.update');
        Route::post('/edit/{id}', [App\Http\Controllers\Dashboard\EmployeesController::class, 'edit'])->name('Employees.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\EmployeesController::class, 'delete'])->name('Employees.delete');
    });

    Route::group(['prefix' => 'Coaches'],function () {
        Route::get('/', [App\Http\Controllers\Dashboard\CoachesController::class, 'index'])->name('Coaches.index');
        Route::get('/create', [App\Http\Controllers\Dashboard\CoachesController::class, 'create'])->name('Coaches.create');
        Route::post('/store', [App\Http\Controllers\Dashboard\CoachesController::class, 'store'])->name('Coaches.store');
        Route::get('/update/{id}', [App\Http\Controllers\Dashboard\CoachesController::class, 'update'])->name('Coaches.update');
        Route::post('/edit/{id}', [App\Http\Controllers\Dashboard\CoachesController::class, 'edit'])->name('Coaches.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\CoachesController::class, 'delete'])->name('Coaches.delete');
    });

    
    // Route::group(['prefix' => 'Category'],function () {

    //     Route::get('/', [App\Http\Controllers\Dashboard\CategoryController::class, 'index'])->name('Category.index');
    //     Route::get('/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'show'])->name('Category.show');
    //     Route::get('/create', [App\Http\Controllers\Dashboard\CategoryController::class, 'create'])->name('Category.create');
    //     Route::post('/store/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'store'])->name('Category.store');
    //     Route::post('/update', [App\Http\Controllers\Dashboard\CategoryController::class, 'update'])->name('Category.update');
    //     Route::get('/edit/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'edit'])->name('Category.edit');
    //     Route::get('/status/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'status'])->name('Category.status');
    //     Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'delete'])->name('Category.delete');
    //     });
        

        Route::group(['prefix' => 'categories'],function () {

            Route::get('/', [App\Http\Controllers\Dashboard\CategoryController::class, 'index'])->name('Category.index');
            Route::get('/create', [App\Http\Controllers\Dashboard\CategoryController::class, 'create'])->name('Category.create');
            Route::post('/store', [App\Http\Controllers\Dashboard\CategoryController::class, 'store'])->name('Category.store');
            Route::post('/update', [App\Http\Controllers\Dashboard\CategoryController::class, 'update'])->name('Category.update');
            Route::get('/edit/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'edit'])->name('Category.edit');
            Route::get('/status/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'status'])->name('Category.status');
            Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\CategoryController::class, 'delete'])->name('Category.delete');
            });

        
    Route::group(['prefix' => 'Products'],function () {
        Route::get('/', [App\Http\Controllers\Dashboard\ProductsController::class, 'index'])->name('Products.index');
        Route::get('/create', [App\Http\Controllers\Dashboard\ProductsController::class, 'create'])->name('Products.create');
        Route::post('/store', [App\Http\Controllers\Dashboard\ProductsController::class, 'store'])->name('Products.store');
        Route::get('/update/{id}', [App\Http\Controllers\Dashboard\ProductsController::class, 'update'])->name('Products.update');
        Route::post('/edit/{id}', [App\Http\Controllers\Dashboard\ProductsController::class, 'edit'])->name('Products.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\ProductsController::class, 'delete'])->name('Products.delete');
    });

    Route::group(['prefix' => 'Courses'],function () {
        Route::get('/{id}', [App\Http\Controllers\Dashboard\CoursesController::class, 'index'])->name('Courses.index');
        Route::get('/create/info', [App\Http\Controllers\Dashboard\CoursesController::class, 'create'])->name('Courses.create');
        Route::post('/store', [App\Http\Controllers\Dashboard\CoursesController::class, 'store'])->name('Courses.store');
        Route::get('/update/{id}', [App\Http\Controllers\Dashboard\CoursesController::class, 'update'])->name('Courses.update');
        Route::post('/edit/{id}', [App\Http\Controllers\Dashboard\CoursesController::class, 'edit'])->name('Courses.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\CoursesController::class, 'delete'])->name('Courses.delete');
    });

    Route::group(['prefix' => 'CourseDetail'],function () {
        Route::get('/{id}', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'index'])->name('CourseDetail.index');

        Route::get('file-upload/video', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'create'])->name('video.create');
        Route::post('upload-large-files', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'uploadLargeFiles'])->name('video.store');

       
        Route::get('/create/details/{id}', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'detailsCreate'])->name('CourseDetail.details.create');
        Route::post('/store/details{id}', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'detailsStore'])->name('CourseDetail.details.store');

        Route::get('/update/{id}', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'update'])->name('video.update');
        Route::post('/edit/{id}', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'edit'])->name('video.edit');


        Route::get('/delete/{id}', [App\Http\Controllers\Dashboard\CourseDetailController::class, 'delete'])->name('CourseDetail.delete');
    });


    Route::group(['prefix' => 'Order'], function () {
        Route::get('/', [App\Http\Controllers\Dashboard\OrderController::class, 'index'])->name('Order.index');
        Route::get('/create', [App\Http\Controllers\Dashboard\OrderController::class, 'create'])->name('Order.create');
        Route::post('/store', [App\Http\Controllers\Dashboard\OrderController::class, 'store'])->name('Order.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Dashboard\OrderController::class, 'edit'])->name('Order.edit');
        Route::get('/show/{id}', [App\Http\Controllers\Dashboard\OrderController::class, 'show'])->name('Order.show');
        Route::put('/update/{id}', [App\Http\Controllers\Dashboard\OrderController::class, 'update'])->name('Order.update');
        Route::get('/delete/{id}',[App\Http\Controllers\Dashboard\OrderController::class, 'delete'])->name('Order.delete');
        Route::get('/approval/{id}',[App\Http\Controllers\Dashboard\OrderController::class, 'approval'])->name('Order.approval');
        Route::get('/search',[App\Http\Controllers\Dashboard\OrderController::class, 'search'])->name('Order.search');
        Route::post('/status', [App\Http\Controllers\Dashboard\OrderController::class, 'status'])->name('Order.status');
    });
                
    });

});



Route::get('/link', function () {
    Artisan::call('storage:link');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
});

