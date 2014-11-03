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

Route::get('/',array('as'=>'home','uses'=>'HomeController@getHome'));
Route::get("/about",array('as'=>'about','uses'=>'HomeController@showAbout'));
Route::get("/faq",array('as'=>'faq','uses'=>'HomeController@showFaq'));
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

//Route::get("/legal",array("as"=>"legal","uses"=>"HomeController@"));
Route::get("/legal", array("as"=>"legal","uses"=>"HomeController@showLegal"));
Route::get("/privacy", array("as"=>"privacy","uses"=>"HomeController@showPrivacy"));
// route to show the login form
Route::get('/login', array('as'=>'login','uses' => 'HomeController@showLogin'));



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
Route::get("/sell",array("as"=>"new_order","uses"=>"HomeController@showSell"));
Route::get("/exchange",array("as"=>"exchange","uses"=>'HomeController@getExchange'));
Route::post("/exchange",array("as"=>"exchange","uses"=>'HomeController@postExchange'));
//Route::post("/exchange",array("as"=>"exchange","uses"=>'HomeController@exchangeData'));
Route::get("/sell",array("as"=>"new_order","uses"=>"HomeController@showSell"));
Route::post("/home/{name?}",array("as"=>'descText','uses'=>'HomeController@DestTxt'));
Route::post("/orderPost",array("as"=>"ord_create","uses"=>"HomeController@orderPost"));
Route::post("/summary",array("as"=>"summary","uses"=>"HomeController@postsummary"));
Route::get("/summary",array("as"=>"show_summary","uses"=>"HomeController@getsummary"));



Route::post('login', function () {
    $user = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
    );

    if (Auth::attempt($user)) {
        //return View::make('account');
        Session::put("userid",Auth::id());
        return Redirect::route('account');
           // ->with('flash_notice', 'You are successfully logged in.');
    }

    // authentication failure! lets go back to the login page
    return Redirect::route('login')
        ->with('flash_error', 'Your username/password combination was incorrect.')
        ->withInput();
});

Route::get("account/home",array("as"=>"account",'before' => 'auth',"uses"=>"AccountController@showHome"));
Route::get("account/profile",array("as"=>"profile",'before' => 'auth',"uses"=>"AccountController@showProfile"));
Route::get("account/orders",array("as"=>"orderlisting",'before' => 'auth',"uses"=>"AccountController@showOrders"));
Route::get("account/changepass",array("as"=>"changepass",'before' => 'auth',"uses"=>"AccountController@showChangepass"));
//Route::get('logout', array('as' => 'logout', function () { }))->before('auth');



Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('login')
        ->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');