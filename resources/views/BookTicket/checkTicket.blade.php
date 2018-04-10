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
           
            <div class="col-md-4 col-sm-12 col-xs-12 fill-info-ticket">
                <h4 class="text-check-ticket text-center bold">Nhập thông tin vé</h4>
                <form method="POST" action="{{ route('ticket.checkedTicket') }}">
                {{Form::token()}}
                    <div class="form-group">
                        <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control" placeholder="Mã vé">
                    </div>
                     @if($errors->has('code'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('code')}}</strong>
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
                    <button type="submit" class="btn btn-check-ticket">Kiểm tra vé</button>
                </form>
            </div>
            <!--End#fill-info-ticket-->
            <div class="col-md-7 col-sm-12 col-xs-12">
            @if ( Session::has('success'))
                <div class="fill-ticket-success">
                   {{--  Vui lòng nhập thông tin và bấm kiểm tra vé --}}
                        {{ Session::get('success') }}                 
                </div>
                 @endif
            </div>
        </div>
   
   
    </div>
    <!--End#row-->
    </div>
@stop