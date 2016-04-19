<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('avatar/{uuid}', ['as' => 'avatar.url', function($uuid) {
    $filename = $uuid . '.png';
    if(Storage::disk('local')->has('avatars/' . $filename)) {
        $file = Storage::disk('local')->get('avatars/' . $filename);
        $mimeType = Storage::disk('local')->mimeType('avatars/' . $filename);

        return response($file, 200)->header('Content-Type', $mimeType);
    }

    return response()->view('errors.404', [], 404);
}]);

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/activate', ['as' => 'activation', 'uses' => 'UserController@activation']);

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
        });

        Route::group(['prefix' => 'manages'], function () {
            Route::group(['prefix' => 'users', 'as' => 'user.', 'middleware' => ['permission:manage-users']], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
                Route::get('form/{uuid?}', ['as' => 'form', 'uses' => 'UserController@form']);
                Route::get('data', ['as' => 'data', 'uses' => 'UserController@ajaxData']);
                Route::post('save', ['as' => 'save', 'uses' => 'UserController@save']);
                Route::post('delete', ['as' => 'delete', 'uses' => 'UserController@delete']);
            });

            Route::group(['prefix' => 'user_roles', 'as' => 'user_role.', 'middleware' => ['permission:manage-roles']], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'UserRoleController@index']);
                Route::get('form/{uuid?}', ['as' => 'form', 'uses' => 'UserRoleController@form']);
                Route::get('data', ['as' => 'data', 'uses' => 'UserRoleController@ajaxData']);
                Route::post('save', ['as' => 'save', 'uses' => 'UserRoleController@save']);
                Route::post('delete', ['as' => 'delete', 'uses' => 'UserRoleController@delete']);
            });

            Route::group(['prefix' => 'controls', 'as' => 'control.', 'middleware' => ['permission:manage-controls']], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'AccessController@index']);
                Route::get('data', ['as' => 'data', 'uses' => 'AccessController@ajaxData']);
                Route::get('permission/{id}', ['as' => 'permission', 'uses' => 'AccessController@ajaxPermissions']);
                Route::post('grant/{permission}/{role_id}', ['as' => 'permission', 'uses' => 'AccessController@ajaxGrantPermission']);
                Route::post('revoke/{permission}/{role_id}', ['as' => 'permission', 'uses' => 'AccessController@ajaxRevokePermission']);
            });
        });
    });
});
