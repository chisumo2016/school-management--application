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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/', function () {
//    return view('admin.home.home');
//});

//Route::group(['middleware' =>['auth']], function (){  });
Route::get('/user-register',[
    'uses' => 'UserRegistrationController@showRegistrationForm',
    'as'     => 'user-register'
    ])->middleware('auth');

Route::post('/user-register',[
    'uses' => 'UserRegistrationController@userSave',
    'as'     => 'user-save'
])->middleware('auth');

Route::get('/user-list',[
    'uses' => 'UserRegistrationController@userList',
    'as'     => 'user-list'
])->middleware('auth');

Route::get('/user-profile/{userId}',[
    'uses' => 'UserRegistrationController@userProfile',
    'as'     => 'user-profile'
])->middleware('auth');

Route::get('/change-user-info/{id}',[
    'uses' => 'UserRegistrationController@changeUserInfo',
    'as'     => 'change-user-info'
])->middleware('auth');

Route::post('user-info-update',[
    'uses' => 'UserRegistrationController@userInfoUpdate',
    'as'     => 'user-info-update'
])->middleware('auth');

Route::get('change-user-avatar/{id}',[
    'uses' => 'UserRegistrationController@changeUserAvatar',
    'as'     => 'change-user-avatar'
])->middleware('auth');


Route::post('/update-user-photo',[
    'uses' => 'UserRegistrationController@updateUserPhoto',
    'as'     => 'update-user-photo'
])->middleware('auth');

Route::get('/change-user-password/{id}',[
    'uses' => 'UserRegistrationController@changeUserPassword',
    'as'     => 'change-user-password'
])->middleware('auth');

Route::post('/user-password-update',[
    'uses' => 'UserRegistrationController@userPasswordUpdate',
    'as'     => 'user-password-update'
])->middleware('auth');


//General Section
Route::get('/add-header-footer',[

    'uses' => 'HomePageController@addHeaderFooterForm',
    'as'     => 'add-header-footer'
]);

Route::post('/header-and-footer-save',[

    'uses' => 'HomePageController@headerAndFooterSave',
    'as'     => 'header-and-footer-save'
]);

Route::get('/manager-header-footer/{id}',[

    'uses' => 'HomePageController@managerHeaderFooter',
    'as'     => 'manager-header-footer'
]);

Route::post('/header-and-footer-update',[

    'uses' => 'HomePageController@headerAndFooterUpdate',
    'as'     => 'header-and-footer-update'
]);

//SLIDER SECTION

Route::get('/add-slider',[

    'uses' => 'SliderController@addslider',
    'as'     => 'add-slider'
]);

Route::post('/upload-slide',[

    'uses' => 'SliderController@uploadSlide',
    'as'     => 'upload-slide'
]);










Auth::routes(['register' => false]);
//https://laravel.com/docs/6.x/authentication#included-routing

Route::get('/home', 'HomeController@index')->name('home');
