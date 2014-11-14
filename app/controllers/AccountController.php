<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/8/14
 * Time: 6:28 PM
 */

class AccountController extends BaseController {


    public function showOrderDetail($orderid){
        $orders = Order::find($orderid);
        return View::make("account.detail", array("myorder"=>$orders))
            ->with("title","Order Detail");
    }

    public function showHome(){
        return View::make("account.home");
    }
    public function showProfile(){
        return View::make("account.profile");
    }
    public function showOrders(){
        //$orders = new Order();
        $orders = DB::table("orders")
            ->where("cus_id","=",Session::get("userid"))
            ->get();
        return View::make("account.orderlisting", array('orders' => $orders));
       // print_r($orders);

    }

    public function getChangePass(){

        return View::make("account.changepassword")->with("title","cahnge password");
    }

    public function postChangePass(){
        $myuser = User::find(Auth::user()->id);
        if($_POST["password"] != $_POST["repass"]){
            Session::flash("message"," <div class='alert alert-danger alert-box'>new password and re-enter password mismatch</div>") ;
            return Redirect::route("changepass");
            exit;
        }
        if(Input::get("oldpass") == ""){
            Session::flash("message","<div class='alert alert-danger alert-box'>please enter  old password</div>") ;
            //echo "<div class='alert alert-danger alert-block'>please enter  old password</div>";
            return Redirect::route("changepass");
            exit;
        }

        if (!Hash::check($_POST["oldpass"], $myuser->password)){
            Session::flash("message"," <div class='alert alert-danger alert-box'>incorrect old password</div>");
            return Redirect::route("changepass");
            exit;
            // The passwords match...

        }
        if(Input::get("password") == "" ){
            Session::flash("message"," <div class='alert alert-danger alert-box'>please enter new password</div>");
            return Redirect::route("changepass");
            exit;
        }
        if(Input::get("password") !="" && Input::get("oldpass") != "" ){
            $myuser->password= Hash::make(Input::get("password"));
            $myuser->update();
            Session::flash("message", " <div class='success alert-box'>password changed successfully</div>");
            return Redirect::route("changepass");
            exit;
        }

    }


 }