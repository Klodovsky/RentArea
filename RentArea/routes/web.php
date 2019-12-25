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


Route::group(['middleware' => 'locale'], function () {

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', function() {
        return view('admin.index');
    });
    Route::resource('admin/users', 'AdminUsersController', ['names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'
    ]]);

    Route::resource('cars/fuels', 'CarFuelController', ['names' => [
        'index' => 'cars.fuels.index',
        'store' => 'cars.fuels.store',
        'edit'  => 'cars.fuels.edit',
    ]]);

    Route::resource('cars/types', 'CarTypeController', ['names' => [
        'index' => 'cars.types.index',
        'store' => 'cars.types.store',
        'edit'  => 'cars.types.edit',
    ]]);

    Route::resource('cars/gearboxes', 'CarGearboxController', ['names' => [
        'index' => 'cars.gearboxes.index',
        'store' => 'cars.gearboxes.store',
        'edit'  => 'cars.gearboxes.edit',
    ]]);

    Route::resource('cars', 'CarController', ['names' => [
        'index' => 'cars.index',
        'create' => 'cars.create',
        'store' => 'cars.store',
        'edit' => 'cars.edit',
    ]]);

    Route::resource('branches', 'CarBranchController', ['names' => [
        'index' => 'cars.branches.index',
        'store' => 'cars.branches.store',
        'edit' => 'cars.branches.edit',
    ]]);
    Route::get('car-reservations', ['as' => 'rent-a-car.show', 'uses'=>'RentalCarsController@display']);

    Route::resource('bikes', 'BikeController', ['names' => [
        'index' => 'bikes.index',
        'create' => 'bikes.create',
        'store' => 'bikes.store',
        'edit' => 'bikes.edit',
    ]]);
    Route::get('bike-reservations', ['as' => 'rent-a-bike.show', 'uses'=>'RentalBikesController@display']);

    Route::resource('motos', 'MotoController', ['names' => [
        'index' => 'motos.index',
        'create' => 'motos.create',
        'store' => 'motos.store',
        'edit' => 'motos.edit',
    ]]);
    Route::get('moto-reservations', ['as' => 'rent-a-moto.show', 'uses'=>'RentalMotoController@display']);

});
Route::group(['middleware' => 'author'], function() {
    Route::get('/admin/authors/{id}', ['as' => 'admin.users.edit-author', 'uses'=> 'AdminUsersController@edit_author']);
    Route::post('admin/authors/{id}', 'AdminUsersController@update_author');
    Route::resource('admin/media', 'AdminMediaController', ['names' => [
        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit',
    ]]);
    Route::resource('admin/posts', 'AdminPostsController', ['names' => [
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
    ]]);
    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
    ]]);
    Route::resource('admin/comments/replies', 'CommentsRepliesController', ['names' => [
        'index' => 'admin.replies.index',
        'show' => 'admin.replies.show',
        'create' => 'admin.replies.create',
        'store' => 'admin.replies.store',
        'edit' => 'admin.replies.edit',
    ]]);
    Route::resource('admin/comments', 'PostsCommentsController', ['names' => [
        'index' => 'admin.comments.index',
        'show' => 'admin.comments.show',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
    ]]);
    Route::get('/post/{slug}',['as' => 'home.post', 'uses' => 'AdminPostsController@post']);
});

//access logged users
Route::group(['middleware' => 'auth'], function() {

    Route::post('comment/reply', 'CommentsRepliesController@createReply');

    /* My account */
    Route::get('user/my-account', ['as' => 'user.user-profile', 'uses'=> 'RentalCarsController@user_profile']);
    Route::get('user/my-account/edit', ['as' => 'user.user-edit', 'uses'=> 'RentalCarsController@user_edit']);
    Route::post('user/my-account', 'RentalCarsController@user_update');
    Route::get('user/my-account/reservations', ['as' => 'user.user-reservations', 'uses'=> 'RentalCarsController@user_reservations']);

});


//rent car

Route::resource('rental-cars', 'RentalCarsController', ['names' => [
    'store' => 'rent-a-car.store',
    'edit' => 'rent-a-car.edit',
]]);



Route::get('/', ['as' => 'rent-a-car.search-car', 'uses'=> 'RentalCarsController@search']);
Route::get('choose-car', ['as' => 'rent-a-car.choose-car', 'uses'=> 'RentalCarsController@choose_car']);
Route::get('additional-services', ['as' => 'rent-a-car.additional-services', 'uses'=> 'RentalCarsController@additional_services']);
Route::get('final-step', ['as' => 'rent-a-car.final-step', 'uses'=> 'RentalCarsController@final_step']);
Route::get('completed-reservation', ['as' => 'rent-a-car.completed-reservation', 'uses'=> 'RentalCarsController@completed_reservation']);



//rent bike

Route::resource('rental-bikes', 'RentalBikesController', ['names' => [
    'store' => 'rent-a-bike.store',
    'edit' => 'rent-a-bike.edit',
]]);



Route::get('rent-a-bike/search', ['as' => 'rent-a-bike.search-bike', 'uses'=> 'RentalBikesController@search']);
Route::get('rent-a-bike/choose', ['as' => 'rent-a-bike.choose-bike', 'uses'=> 'RentalBikesController@choose_bike']);
Route::get('rent-a-bike/final-step', ['as' => 'rent-a-bike.final-step', 'uses'=> 'RentalBikesController@final_step']);
Route::get('rent-a-bike/completed-reservation', ['as' => 'rent-a-bike.completed-reservation', 'uses'=> 'RentalBikesController@completed_reservation']);


Route::get('/settings/lang', function () {
    return App::getLocale();
});

Route::get('/settings/lang/{id}', function ($locale) {
    Session::put('locale', $locale);

    return back();
});

//rent moto

Route::resource('rental-motos', 'RentalMotoController', ['names' => [
    'store' => 'rent-a-motos.store',
    'edit' => 'rent-a-motos.edit',
]]);

Route::get('rent-a-moto/search', ['as' => 'rent-a-moto.search-moto', 'uses'=> 'RentalMotoController@search']);
Route::get('rent-a-moto/choose', ['as' => 'rent-a-moto.choose-moto', 'uses'=> 'RentalMotoController@choose_moto']);
Route::get('rent-a-moto/final-step', ['as' => 'rent-a-moto.final-step', 'uses'=> 'RentalMotoController@final_step']);
Route::get('rent-a-moto/completed-reservation', ['as' => 'rent-a-moto.completed-reservation', 'uses'=> 'RentalMotoController@completed_reservation']);

});

