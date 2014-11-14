<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/9/14
 * Time: 9:01 PM
 */?>
@extends("layouts.account")
@section("content")
<div class="portlet box green">
    <div class="portlet-title">
        <h4><i class="fa fa-icon-list"></i>Orders</h4>

    </div>
    <div class="row">

        <div class="portlet-body">
            <form name="lines" id="lines">
                <table class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th><a href="#">Reference</a></th>
                        <th><a href="#">Date</a></th>
                        <th><a href="#">SRC:Amount</a></th>
                        <th><a href="#">DST:Account</a></th>
                        <th><a href="#">Exchange Rate</a></th>
                        <th><a href="#">Note</a></th>
                        <th><a href="#">DST:Amount</a></th>
                        <th width="8%">Status</th>
                    </tr>
                    </thead>
                    <tbody>

                            <?php
                            $x=1;
                            if(count($orders) > 0){

                    foreach($orders as $order){

                        if($x%2 == 0){
                            echo "<tr cass='even' >";
                        }else{
                            echo "<tr cass='odd' >";
                        }
                        echo '<td>';
                            ?>
                        {{HTML::linkRoute('orderdetail',$order->order_id,$order->id)}}
                        <?php
                        echo '</td>
                        <td title="06-28 13:54">'. $order->created_at.'</td>
                        <td><img src="../img/15_combo.gif"><span class="money_1">'. $order->order_amount.'</span></td>
                        <td>';
                            if($order->order_type == "Sell"){
                                echo $order->ecurrency;
                            }elseif($order->order_type =="Buy"){
                                echo $order->order_transfer_type;
                            }
                        echo '</td>
                        <td>'. $order->order_type.'</td>
                        <td style="text-align:center">
                            <div data-original-title="Status changed to Pending"   id="dashboard-report-range" style="display: block;">
                                <a href="#"><img src="../img/r_more.gif"></a>
                            </div>
                        </td>
                        <td><a href="#" title="">
                                <img src="../img/3_combo.gif" border="0">'.$order->final_amount.'</a>
                        </td>
                        <td>
                            <span class="label label-warning" style="font-weight:bold; line-height:18px">';
                            if($order->order_status == 0)
                                { echo "Open"; }
                            elseif($order->order_status == 1)
                                { echo "Received"; }
                            elseif($order->order_status == 2)
                                { echo "Sent"; }
                            elseif($order->order_status == 3)
                                { echo "Close"; }
                            elseif($order->order_status == 4)
                                { echo "Cancelled"; }
                            elseif($order->order_status == 5)
                                { echo "Expired"; }
                            elseif($order->order_status == 6)
                                { echo "Declined"; }
                            elseif($order->order_status == 7)
                                { echo "Refunded"; }

                            echo '</span>
                        </td>
                    </tr>';
                    $x++;
                    }
                            }else{
                                echo "<tr> <td colspan='8'> No order to display</td></tr>";
                            }
?>
                    </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop