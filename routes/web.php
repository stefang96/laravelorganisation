<?php

use \Illuminate\Support\Facades\Route;
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

Route::get('/',function (){
    return view('home');
});
Route::get('/home','PagesController@index');
Route::get('/logout','PagesController@logout');
Route::resource('news','NewsController');
Route::get('/about','PagesController@about');
Route::get('news/filterNews/{id}','NewsController@filterNews')->name('filterNews');
Route::resource('members','MembersController');
Route::get('members/filterMembers/{id}','MembersController@filterMembers')->name('filterMembers');
Route::get('/filterNews/{idUser}/{id}','PagesController@filterNews');
Route::get('/filterPayment/{idUser}/{id}','PagesController@filterPayment');

Route::get('newsAndPayments/{newsAndPayments}','PagesController@newsPayments');
Route::post('/members/membership','MembersController@membership');
Route::get('/paymentOverview','PagesController@paymentOverview');
Route::get('/waitingList','PagesController@waitingList');

//ajax
Route::post('/login','PagesController@login');
Route::post('/registration','PagesController@registration');
Route::post('/validateRegistration','PagesController@validateRegistration');
Route::post('/ajaxConfrimMembers','PagesController@ajaxConfrimMembers');
Route::post('/ajaxSentMail','PagesController@ajaxSentMail');
Route::get('/allowMember/{allowMember}','PagesController@allowMember');

//Auth::routes();


