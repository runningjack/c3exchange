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


    public function showHome(){

        return View::make("account.home")
            ->with("title", "")
            ->with("myuser", Auth::user())
            ->with("orders",DB::table("orders")->where('cus_id', '=', Auth::user()->id));
    }

    public function showLogin(){
        return View::make('pages.login');
    }

    public function doLogin(){
        $userdata = array();        // validate the info, create rules for the inputs;
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
                // validation successful! redirect them to the secure section or whatever->with("message","Registration Successful! <br /> "
                // return Redirect::to('secure');
                //$stud = DB::table("users")->where('id', '=', Auth::user()->id);
                return Redirect::route("account");

            } else {

                // validation not successful, send back to form
                return Redirect::to('login');

            }

        }
    }

    public function doLogout(){
        Auth::logout();
        return Redirect::route("account");
    }

    public function showRegister(){
        return View::make('pages.register')
            ->with("country",DB::table("country")->get());
    }
    public function showSuccess(){
        return View::make('pages.success');

    }

    public function showBuy(){
        return View::make('pages.buy')
            ->with("currencies",DB::table("emoneys")->get())
            ->with("country",DB::table("country")->get())
            ->with("etypes",DB::table("paytypes")->get());
    }

    public function showSell(){
        return View::make('pages.sell')
            ->with("currencies",DB::table("emoneys")->get())
            ->with("country",DB::table("country")->get())
            ->with("etypes",DB::table("paytypes")->get());
    }

    public function DestTxt($name){
        //echo $name;
        $darray = array();
        $darray = explode("7",$name);
        $data = array();
        $result = DB::table("emoneys")

            ->where("ecurrency",'"'.$darray[0].'"')->get();
        $results = Emoney::all();
        //print_r($result);
        foreach($results as $result){
            if($result->ecurrency == $darray[0]){
               // $data = $result->ecurrency;
                /*
                   This loop is used to generate the rate for
               selected currency
               */
                $data[] =$result->ecurrency;
                //array_push($data,$result->ecurrency);
                $rates = DB::table("rates")->get();
                foreach($rates as $rate){
                /*
                    This loop is used to generate the rate for
                selected currency
                */
                    if($rate->ecurrency == $darray[0] && $rate->extype == $darray[1]){
                        $data[] =$rate->rate;
                    }

                }
            }
        }

        return $data ;
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

    public function getsummary(){
        return View::make('pages.summary');
    }

    public function postsummary(){
        $validation = Order::validate(Input::all());
        if($validation->fails()){
            return Redirect::Route("new_order")->withErrors($validation)->withInput();
        }else{
            try{
                $order = new Order();
                $order->order_id                        =   Order::order_reference("");
                $order->order_type                      =   Input::get("order_type");
                $order->order_transfer_type              =   Input::get("order_transfer_type");
                $order->order_amount                    =   Input::get("order_amount");
                $order->final_amount                    =   Input::get("final_amount");
                //$order->fee_amount                    =   Input::get("dob");
                $order->total_amount                    =   Input::get("total_amount");
                $order->offer_amount                    =   Input::get("offer_amount");
                $order->ecurrency                       =   Input::get("ecurrency");
                //$order->curreny                       =   Input::get("soo");
                if($order->order_type == "Sell" ){
                    $order->bank_account_no                 =   Input::get("bank_account_no");
                    $order->bank_swift_code                 =   Input::get("bank_swift_code");
                    $order->bank_account_name               =   Input::get("bank_account_name");
                    $order->bank_name                       =   Input::get("bank_name");
                    $order->bank_address                    =   Input::get("bank_address");
                    $order->bank_city                       =   Input::get('bank_city');
                    $order->bank_state                      =   Input::get("bank_state");
                    $order->bank_zip                        =   Input::get("bank_zip");
                    $order->bank_routing                    =   Input::get("termediary_swift");
                    $order->comment                         =   Input::get("comment");
                }

                $order->cus_fullname                    =   Input::get("cus_fullname");
                $order->cus_email                       =   Input::get("cus_email");
                $order->cus_address                     =   Input::get("cus_address");
                $order->cus_city                        =   Input::get("cus_city");
                $order->cus_state                       =   Input::get("cus_state");
                $order->cus_zip                         =   Input::get("cus_zip") ;
                $order->cus_country                     =   Input::get("cus_country");

                $order->ecurrency_account               =   Input::get("ecurrency_account");
                $order->ecurrency_title                 =   Input::get("ecurrency_title");
                $order->created_at                      =   date("Y-m-d H:i:s");
                $order->updated_at                      =   date("Y-m-d H:i:s");
                Session::put("orderobj",serialize($order));
                return View::make("pages.summary")->with("order",$order);
            }
            catch (Exception $e ){
                echo var_dump($e->getMessage());
            }
        }
    }


    public function orderPost(){
        if(Session::has("orderobj")){
            $order = new Order();
            $order = unserialize(Session::get("orderobj"));
            $order->save();
            return Redirect::Route("success")->with("message","Thnak you for choosing us you order is being processed");
        }else{
            try{

                $order = Session::get("orderobj");
                /*$order->order_type                      =   Input::get("order_type");
                $order->order_amount                    =   Input::get("order_amount");
                $order->final_amount                    =   Input::get("final_amount");
                //$order->fee_amount                    =   Input::get("dob");
                $order->total_amount                    =   Input::get("total_amount");
                $order->offer_amount                    =   Input::get("offer_amount");
                $order->ecurrency                       =   Input::get("ecurrency");
                //$order->curreny                       =   Input::get("soo");
                $order->bank_account_no                 =   Input::get("bank_account_no");
                $order->bank_swift_code                 =   Input::get("bank_swift_code");
                $order->bank_account_name               =   Input::get("bank_account_name");
                $order->bank_name                       =   Input::get("bank_name");
                $order->bank_address                    =   Input::get("bank_address");
                $order->bank_city                       =   Input::get('bank_city');
                $order->bank_state                      =   Input::get("bank_state");
                $order->bank_zip                        =   Input::get("bank_zip");
                $order->bank_routing                    =   Input::get("termediary_swift");
                $order->cus_fullname                    =   Input::get("cus_fullname");
                $order->cus_email                       =   Input::get("cus_email");
                $order->cus_address                     =   Input::get("cus_address");
                $order->cus_city                        =   Input::get("cus_city");
                $order->cus_state                       =   Input::get("cus_state");
                $order->cus_zip                         =   Input::get("cus_zip") ;
                $order->cus_country                     =   Input::get("country");
                $order->comment                         =   Input::get("comment");
                $order->ecurrency_account               =   Input::get("ecurrency_account");
                $order->ecurrency_title                 =   Input::get("ecurrency_title");
                $order->created_at                      =   date("Y-m-d H:i:s");
                $order->updated_at                      =   date("Y-m-d H:i:s");*/
                $order->save();
                return Redirect::route("success")->with("message","Student Successfully created");
            }
            catch (Exception $e ){
                echo var_dump($e->getMessage());
            }
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
