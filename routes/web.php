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

Route::get('/manage-slider',[

    'uses' => 'SliderController@manageSlider',
    'as'     => 'manage-slider'
]);

Route::get('/slide-unpublished/{id}',[

    'uses' => 'SliderController@slideUnpublished',
    'as'     => 'slide-unpublished'
]);

Route::get('/slide-npublished/{id}',[

    'uses' => 'SliderController@slidePublished',
    'as'     => 'slide-published'
]);

Route::get('/photo-gallery',[

    'uses' => 'SliderController@photoGallery',
    'as'     => 'photo-gallery'
]);


Route::get('/slide-edit/{id}',[

    'uses' => 'SliderController@slideEdit',
    'as'     => 'slide-edit'
]);


Route::post('/update-slide',[

    'uses' => 'SliderController@updateSlide',
    'as'     => 'update-slide'
]);

Route::get('/slide-delete{id}',[

    'uses' => 'SliderController@slideDelete',
    'as'     => 'slide-delete'
]);
//==============================================

//Schools Management
Route::get('/school/add',[

    'uses' => 'SchoolManagementController@addSchoolForm',
    'as'     => 'add-school'
]);

Route::post('/school/add',[

    'uses' => 'SchoolManagementController@schoolSave',
    'as'     => 'school-save'
]);

Route::get('/school/list',[

    'uses' => 'SchoolManagementController@schoolList',
    'as'     => 'school-list'
]);

Route::get('/school/unpublished/{id}',[

    'uses' => 'SchoolManagementController@SchoolUnpublished',
    'as'     => 'school-unpublished'
]);

Route::get('/school/published/{id}',[

    'uses' => 'SchoolManagementController@SchoolPublished',
    'as'     => 'school-published'
]);

Route::get('/school/edit/{id}',[

    'uses' => 'SchoolManagementController@schoolEdit',
    'as'     => 'school-edit'
]);

Route::post('/school/update',[

    'uses' => 'SchoolManagementController@schoolUpdate',
    'as'     => 'school-update'
]);


Route::get('/school/delete/{id}',[

    'uses' => 'SchoolManagementController@schoolDelete',
    'as'     => 'school-delete'
]);


//Class Management
Route::get('/class/add',[

    'uses' => 'ClassManagementController@addClassForm',
    'as'     => 'add-class'
]);

Route::post('/class/add',[
    'uses' => 'ClassManagementController@classSave',
    'as'     => 'class-save'
]);

Route::get('/class/list',[
    'uses' => 'ClassManagementController@classList',
    'as'     => 'class-list'
]);

Route::get('/class/unpublished/{id}',[
    'uses' => 'ClassManagementController@classUnpublished',
    'as'     => 'class-unpublished'
]);

Route::get('/class/published/{id}',[
    'uses' => 'ClassManagementController@classPublished',
    'as'     => 'class-published'
]);

Route::get('/class/edit/{id}',[
    'uses' => 'ClassManagementController@classEdit',
    'as'     => 'class-edit'
]);

Route::post('/class/update/',[
    'uses' => 'ClassManagementController@classUpdate',
    'as'     => 'class-update'
]);

Route::get('/class/delete/{id}',[
    'uses' => 'ClassManagementController@classDelete',
    'as'     => 'class-delete'
]);

//Batch Management

Route::get('/add/batch',[
    'uses' => 'BatchManagementController@addBatch',
    'as'     => 'add-batch'
]);


Route::post('/add/batch',[
    'uses' => 'BatchManagementController@batchSave',
    'as'     => 'batch-save'
]);

Route::get('/batch/list',[
    'uses' => 'BatchManagementController@batchList',
    'as'     => 'batch-list'
]);

Route::get('/batch/list-by-ajax',[
    'uses' => 'BatchManagementController@batchListbyAjax',
    'as'     => 'batch-list-by-ajax'
]);

Route::get('/batch/unpublished',[
    'uses' => 'BatchManagementController@batchUnpublished',
    'as'     => 'batch-unpublished'
]);

Route::get('/batch/published',[
    'uses' => 'BatchManagementController@batchPublished',
    'as'     => 'batch-published'
]);

Route::get('/batch/delete',[
    'uses' => 'BatchManagementController@batchDelete',
    'as'     => 'batch-delete'
]);

Route::get('/batch/edit/{id}',[
    'uses' => 'BatchManagementController@batchEdit',
    'as'     => 'batch-edit'
]);

Route::post('/batch/update',[
    'uses' => 'BatchManagementController@batchUpdate',
    'as'     => 'batch-update'
]);




































Auth::routes(['register' => false]);
//https://laravel.com/docs/6.x/authentication#included-routing

Route::get('/home', 'HomeController@index')->name('home');
