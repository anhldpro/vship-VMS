@extends('layouts.masterTicket')
@section('contents')
<style>
    .fill-ticket-success{
    margin-top: 42px;
    text-align: center;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #3c763d;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
</style>
<div class="check-ticket">
    <div class="container ">
        <div class="row">
           
            <div class="col-md-3 col-sm-12 col-xs-12 fill-info-ticket">
                <h4 class="text-check-ticket text-center bold">Nhập Số Điện Thoại</h4>
                <form method="POST" name="frmFind" id="frmFind" action="{{ route('ticket.history') }}">
                {{Form::token()}}

                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="SĐT">
                    </div>
                    @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('phone')}}</strong>
                                        </span>   
                                    @endif   
                    <div class="form-group ">
                       
                            {!! Recaptcha::render() !!}
                      
                    </div>
                    @if($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('g-recaptcha-response')}}</strong>
                                        </span>   
                                    @endif   
                    <button type="submit" class="btn btn-check-ticket">Tìm Kiếm</button>
                </form>
            </div>
            <!--End#fill-info-ticket-->
    
        </div>
   
   
    </div>
    <!--End#row-->
    </div>
    
@stop