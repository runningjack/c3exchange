<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/8/14
 * Time: 6:28 PM
 */

class AccountController extends BaseController {
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
 }