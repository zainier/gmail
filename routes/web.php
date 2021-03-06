<?php

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

/* Redirects */
Route::redirect('/', '/emails');

/* Auth */
Auth::routes();

/* Google OAuth2*/
Route::get('/oauth/gmail', 'Auth\LoginController@redirectToProvider')->name('oauth-gmail');
Route::get('/oauth/gmail/callback', 'Auth\LoginController@handleProviderCallback');

/* Emails */
Route::middleware(['auth'])->name('emails.')->group(function () {
    Route::get('/emails', 'GmailController@index')->name('index');
    Route::get('/emails/load', 'GmailController@load')->name('load');
});

