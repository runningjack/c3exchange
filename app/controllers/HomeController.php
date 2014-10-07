<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function showLogin(){
        return View::make('pages.login');
    }

    public function doLogin(){
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' 	=> Input::get('email'),
                'password' 	=> Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful! redirect them to the secure section or whatever
                // return Redirect::to('secure');
                echo 'SUCCESS!';

            } else {

                // validation not successful, send back to form
                return Redirect::to('login');

            }

        }
    }

    public function showRegister(){
        return View::make('pages.register')
            ->with("country",DB::table("country")->get());
    }
    public function showSuccess(){
        return View::make('pages.success');

    }

    public function showBuy(){
        return View::make('pages.buy');
    }

    public function showSell(){
        return View::make('pages.sell');
    }

    public function doRegister(){
        $validation = User::validate(Input::all());
        if($validation->fails()){
            return Redirect::Route("new_student")
                ->withInput(Input::except('password'))
                ->withErrors($validation)->withInput();
        }else{
            $user = new User();
            $user->fname                = Input::get('fname');
            $user->lname                = Input::get('lname');
            $user->username             = Input::get("username");
            $user->address              = Input::get("address");
            $user->phone                = Input::get("phone");
            $user->city                 = Input::get("city");
            $user->country              = Input::get("country");
            //$user->ipaddress = Input::get();

            $user->email                =   Input::get("email");
            $user->password             = Hash::make(Input::get("password"));
            $user->save();

            $subject ="Your registration was successful";
            $msg ="<p>Congratulation! You registration at CG3 Exchange was successful</p>";
            $msg .="<p>
                    You can login to your Lagos City Polytechnic Library Portal home page of the library site
                    <a href='http://www.cg3exchange.com/'>www.cg3exchange.com</a> using the username and password below:</p>
                    <p>E-mail: ". $user->email."<br>
                    Password:  Your password is the password you created when you registered on the site.</p>


<p>With your CG3 Exchange account, you can quickly access and update important information:
&nbsp;
– Buy e-currency <br>
– Sell e-currency<br>

<p>
<p>If you have any questions, please contact us at support@cg3exchange.com</p>
                ";

           // sendMail2($user->fullname(),$subject,$msg,$user->email);
            return Redirect::route("success")->with("message","Registration Successful! <br /> ");

        }
    }

}


function sendMail2($name,$subject,$msg,$copy){
    $mail                                     = new Mail();
    $template                                 = new Mailtemplate();
    $template->data['mail_from']              = "Global Currency Exchange";
    $template->data['web_url']                = "http://www.cg3exchange.com";
    $template->data['logo']                   = "logo.png";
    $template->data['company_name']           = "CG3 Exchange.";
    $template->data['text_from']              = "CG3 Exchange.";
    $template->data['text_greeting']          ="Dear ".$name;
    $template->data['text_footer']            ="Thank you";
    $template->data['text_message']           = "<b>Welcome to CG3 Exchange!</b>";
    $template->data['message']                = $msg;

    $mail->setTo($copy);
    $mail->setFrom("noreply@cg3exchange.com");
    $mail->setSender("CG3 Exchange");
    $mail->setSubject($subject);
    $mail->setHtml($template->gettmp('http://www.mylcpschoolbook.net/librarySystem/library/email1.tpl'));
    if($mail->send()){
        return true;
    }else{
        return false;
    }
}
