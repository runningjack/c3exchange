<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/8/14
 * Time: 7:53 PM
 */

class Order extends Eloquent {
    public static $rules = array(
        'order_type'=>'required',
        'order_amount'=>'required|numeric',
        'final_amount'=>'required',
        'ecurrency'=>'required',
        'cus_fullname'=>'required|min:3',
        'cus_email'=>'required|email',
        'ecurrency_account'=>'required|min:4'
    );

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }

    public static function order_reference($module="exchange"){
        $random = substr(number_format(time() * rand(),0,'',''),0,10);
        $randid = self::getID($module).$random;
        return $randid;
    }

    private static  function getID($module){
        global $database;
        //$sql=("INSERT INTO tbltransref (name) VALUE('". $module ."')");
        $id= DB::table('tbltransref')->insertGetId(
            array('name' =>$module));

        if ($id){

            $careid = str_pad($id, 4, "0", STR_PAD_LEFT);
            return $careid;
        }
        else{
            return false;
        }
    }
}