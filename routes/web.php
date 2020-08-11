<?php

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

Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes();
Route::group(['middleware' => 'auth'], function() {
	Route::group(['middleware' => ['role:admin']], function() {
		// User
		Route::resource('/user', 'UserController')->except([
			'show'
		]);
		// Role
		Route::resource('/role', 'RoleController')->except([
			'create', 'show', 'edit', 'update'
		]);
		// Set Role
		Route::get('/user/roles/{id}', 'UserController@roles')->name('user.role');
		Route::put('/user/roles/{id}', 'UserController@setRole')->name('user.set_role');
		// Role Permission
		Route::post('/user/permission', 'UserController@addPermission')->name('user.add_permission');
		Route::get('/user/role-permission', 'UserController@rolePermission')->name('user.role_permission');
		Route::put('/user/permission/{role}', 'UserController@setRolePermission')->name('user.setRolePermission');
	});
	// Dashboard
	Route::get('/home', 'HomeController@index')->name('home');
	// Buku
	Route::resource('/buku', 'BukuController');
	// Kategori
	Route::resource('/kategori', 'KategoriController');
	// Anggota
	Route::resource('/anggota', 'AnggotaController');
});
