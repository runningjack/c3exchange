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
        'order_amount'=>'required',
        'final_amount'=>'required',
        'ecurrency'=>'required',
        'cus_fullname'=>'required',
        'cus_email'=>'required'
    );

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }

    public static function order_reference($module="exchage"){
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

            $careid = str_pad($id, 6, "0", STR_PAD_LEFT);
            return $careid;
        }
        else{
            return false;
        }
    }
}