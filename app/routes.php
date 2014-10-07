<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',array('as'=>'home'), function()
{
    return View::make('pages.home');
});
Route::get("/about", function(){
    return View::make('pages.about');
});
Route::get("/contact", function(){
    return View::make('pages.contact');
});
// route to show registration form
Route::get('/register', array('as'=>'register_now','uses'=> 'HomeController@showRegister'));

// route to process registration
Route::post('/register', array('as'=>'do_register','uses'=>'HomeController@doRegister'));
// route to registration success page
Route::get('/success',array('as'=>'success',"uses"=>"HomeController@showSuccess"),function(){
    return View::make('pages.success');
});

// route to show the login form
Route::get('/login', array('as'=>'login','uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

/*
 * section for buy e-currency
 *
 * */

Route::get("/buy",array("as"=>"buy_currency","uses"=>'HomeController@showBuy'));

/*
 * section for sell e-currency
 *
 * */

Route::get("/sell",array("as"=>"sell_currency","uses"=>'HomeController@showSell'));

