@extends('layouts.masterTicket')
@section('contents')
<style>
     .form-horizontal .form-group {
                            margin-left: 0px;
                            margin-right: 0px;
                            }
                        </style>
<div id="main" class="home-page">
    <div class="container home-search-ticket-panel">
        <div class="row">

        <div id="replaceDiv">
            <div id="searchResults">
                <div class="booking-expand  clearfix">
                    <form action="{{route('ticket.history')}}" method="POST" class="frmSeatSelection form-horizontal col-12 col-md-12 col-xs-12" style="padding:0px !important;">
                    {{Form::token()}}
                        
                        <div class="table_bookticket" style="width: 90%;margin:0 auto;border: 1px solid #2461aa;">
                            <table class="table seat-template-table table-noborder mb0">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="hidden-xs" style="vertical-align: middle;">THÔNG TIN VÉ XE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pl0 hidden-xs td-info" style="border-right: 1px solid #eee !important;padding-right:20px; ">
                                        <table class="table table-info" style="min-width:330px;margin-left: 10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-6 col-sm-12 pl0 pr0">Lộ trình:</td>
                                                    <td><b>{{ $bookTicket->itinerary['slug'] }}
                                                </tr>
                                                <tr>
                                                    <td class="col-md-6 col-sm-12 pl0 pr0">Nhà Xe:</td>
                                                    <td><b>{{ $bookTicket->car_company['name'] }}
                                                </tr>
                                                <tr>
                                                    <td class="col-md-6 col-sm-12 pl0 pr0">Ngày khởi hành:</td> 
                                                    <td><b><span class="departure-date">{{ $bookTicket['date_start'] }}</span></b></td>
                                                </tr>

                                                    {{-- <tr>
                                                        <td class="col-md-6 col-sm-12 pl0 pr0">Địa chỉ xuất phát:</td>
                                                        <td><b><span>{{$bookTicket['departPlace']}}</span></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-6 col-sm-12 pl0 pr0">Địa chỉ điểm đến:</td>
                                                        <td><b><span>{{$bookTicket['destination']}}</span></b></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td class="col-md-6 col-sm-12 pl0 pr0">Người đặt vé:</td>
                                                        <td><b><span>{{ $bookTicket['name'] }}</span></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-6 col-sm-12 pl0 pr0">Số điện thoại:</td>
                                                        <td><b><span>{{$bookTicket['phone']}}</span></b></td>
                                                        <input type="hidden" name="phone" value="{{$bookTicket['phone']}}">
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-6 col-sm-12 pl0 pr0">Email:</td>
                                                        <td><b><span>{{ $bookTicket['email'] }}</span></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-6 col-sm-12 pl0 pr0">Mã vé:</td>
                                                        <td><b><span>{{ $bookTicket['code'] }}</span></b></td>
                                                    </tr>
                                            </tbody>

                                        </table>
                                    </td>    
                                    <td class="customer-info-col">

                                        <div class="clearfix"></div>
                                            <div class="col-md-offset-3 col-md-8 col-sm-11 pl0 pr0 cont-container text-center">
                                                    <button  type="submit" class="btn cont-btn btn btn-vxr-lg btn-vxr-lg-action btn-lg btn-warning">
                                                        Lịch Sử
                                                    </button>

                                        </div>
                                        <div class="text-right pull-right col-md-offset-4 col-md-7 pl0">
                                        </div>
                                       
                                    </td>
                                         
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        
                    </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>

@stop
