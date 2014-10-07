<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/6/14
 * Time: 2:08 PM
 */
?>
@extends("layouts.sidebar")
@section("content")
<div class="">
    <?php
    try{
        if(Session::has('message')){
            echo "<p>".Session::get("message")."</p>";
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

    ?>
</div>
@stop