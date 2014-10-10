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
        <h4><i class="icon-list"></i>Pending    Orders</h4>

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


                    <tr class="odd">
                        <td><a name="97" id="97"></a>#<a href="#" title="Edit this order">1210335831</a></td>
                        <td title="06-28 13:54">2 years ago</td>
                        <td><img src="../img/15_combo.gif"><span class="money_1">$10.00</span></td>
                        <td>U8755005</td>
                        <td></td>
                        <td style="text-align:center">
                            <div data-original-title="Status changed to Pending"   id="dashboard-report-range" style="display: block;">
                                <a href="#"><img src="../img/r_more.gif"></a></div></td>
                        <td><a href="#" title="">
                                <img src="../img/3_combo.gif" border="0"> 9.82</a></td>
                        <td>
                            <span class="label label-warning" style="font-weight:bold; line-height:18px">Pending</span>
                        </td></tr>

                    <tr class="even">
                        <td><a name="116" id="116"></a>#<a href="#" title="Edit this order">1045747891</a></td>

                        <td title="06-28 13:54">2 years ago</td>
                        <td><img src="../img/5_combo.gif"><span class="money_1">$1.00</span></td>
                        <td>U8755005</td>
                        <td></td>
                        <td style="text-align:center">
                            <div data-original-title="Status changed to Pending"   style="display: block;">
                                <a href="#"><img src="../img/r_more.gif"></a></div></td>
                        <td><a href="#" ><img src="../img/15_combo.gif" border="0"> <span class="money_1">$0.98</span></a></td>
                        <td>
                            <span class="label label-warning" style="font-weight:bold; line-height:18px">Pending</span>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop