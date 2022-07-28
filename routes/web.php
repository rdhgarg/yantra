<?php

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

Route::get('/test', function () { return view('auth.login'); });

Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('migrate');
    $exitCode = Artisan::call('optimize');
    return 'DONE'; //Return anything
});
Auth::routes();


Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('admin/login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/admin/franchise-list', 'Backend\SiteAuthController@getFranchiseData')->name('franchise-list')->middleware(['permission:Fund Raiser List']);
Route::get('/admin/viewdetail/{id}', 'Backend\SiteAuthController@viewDetail')->name('view-details')->middleware(['permission:Banner Edit']);



// Route::get('/admin/franchise-list', 'Backend\SiteAuthController@getPDF');

Route::group(['middleware' => ['auth'], 'namespace' => 'Backend'], function() {

    Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/admin/get-all-notification', 'DashboardController@getAllNotification');

    //User Master
    Route::group(['middleware' => ['permission:User Master']], function() {
        Route::get('/admin/user-list', 'UserController@Users')->name('user-list')->middleware(['permission:User List']);
        Route::get('/admin/user-create', 'UserController@CreateUser')->name('user-create')->middleware(['permission:User Create']);
        Route::get('/admin/user-edit/{id}', 'UserController@EditUser')->name('user-edit')->middleware(['permission:User Create']);
        Route::get('/admin/ajax/users/view-user/{id}', 'UserController@showUser')->name('view-user')->middleware(['permission:User View']);
        Route::post('/admin/save-user', 'UserController@SaveUser')->name('save-user');
        Route::post('/admin/update-user/{id}', 'UserController@UpdateUser')->name('update-user');
    });

    //Product Master
    Route::group(['middleware' => ['permission:Product Master']], function() {
        Route::get('/admin/product/get-subcategory', 'ProductController@getSubcategory')->name('get-subcategory')->middleware(['permission:Product Edit']);
    });

    /* Package Controller  */
    Route::get('chart', 'ChartController@index');

    Route::post('site-register', 'SiteAuthController@siteRegisterPost');

    Route::get('autocomplete', 'PackageController@autocomplete')->name('autocomplete');
    Route::get('pdfview',array('as'=>'pdfview','uses'=>'PackageController@pdfview'));
    /* Package Controller  */
    Route::get('/setting', 'SettingController@index')->name('setting');
    Route::post('/setting/password/update', 'SettingController@updatePassword')->name('password-update');
    Route::get('/admin/roles-list', 'RolePermissionController@roles')->name('roles-list');
    Route::get('/admin/roles/create', 'RolePermissionController@create')->name('roles-create');
    Route::post('/admin/roles/store', 'RolePermissionController@store')->name('roles-store');
    Route::get('/admin/roles/edit/{id}', 'RolePermissionController@edit')->name('roles-edit');
    Route::post('/admin/roles/update/{id}', 'RolePermissionController@update')->name('roles-update');
    Route::get('/admin/ajax/roles/view/{id}', 'RolePermissionController@show')->name('roles-view');

});




/* Front Routes --  */
Route::get('site-register', 'Backend\SiteAuthController@siteRegister');


Route::group(['middleware' => ['isLogin'], 'namespace' => 'Frontend'], function() {
    Route::get('/ajax-notification', 'FundRaiserController@ajaxNotification')->name('ajax-notification');
    Route::get('/ajax-notification-update', 'FundRaiserController@ajaxNotificationUpdate')->name('ajax-notification-update');
});


