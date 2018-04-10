@extends('layouts.masterTicket')
@section('contents')
<div class="contact-1">
  <div class="container">
    <div class="header-content">
      <div class="row">
        <div class="col-md-12">
          <h1 class="h1-text uppercase">
            <strong>Liên hệ </strong>
          </h1>
        </div>
      </div>
    </div>
    <div id="main">
      <div class="row main-content">
        {{-- <div class="col-md-3">
          <div class="lh-quote">
            <div class="tt-lh">
              <h6 class="h6-text">BAN QUAN TRỊ WEBSITE VEXERE.COM</h6>
              <p class="p-text"><i class="fa fa-home"></i>
                <a href="# ">CÔNG TY CỔ PHẦN TESLA VIỆT NAM</a> </p>
              </div>
            </div>
          </div> --}}<!--left-->
          <div class="col-md-12 contact-content ">
            <div id="lienhe ">
             <form method="post" id="contact" action="contact"  enctype= "multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

             <div class="panel-heading bold uppercase ">THÔNG TIN NGƯỜI LIÊN HỆ</div>
             <div class="panel-body ">
                <div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
                 <label  class="col-sm-3">Họ tên (*)</label>
                 <div class="col-sm-9 ">
                   <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên">
                  @if($errors->has('name'))
                        <span class="help-block">
                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                        </span>   
                    @endif
                </div>
              </div>
      
              <div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error' : '' }}">
                 <label  class="col-sm-3">Ðiện thoại (*)</label>
                 <div class="col-sm-9 ">
                   <input type="text" class="form-control" id="phone" name="phone" placeholder="Số Điện thoại">
                  @if($errors->has('phone'))
                        <span class="help-block">
                            <strong style="color: red;">{{$errors->first('phone')}}</strong>
                        </span>   
                    @endif
                </div>
              </div>
              <div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error' : '' }}">
                 <label  class="col-sm-3">Email (*)</label>
                 <div class="col-sm-9 ">
                   <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                  @if($errors->has('email'))
                        <span class="help-block">
                            <strong style="color: red;">{{$errors->first('email')}}</strong>
                        </span>   
                    @endif
                </div>
              </div>
              <div class="form-group ">
                <label for="input7 " class="col-sm-3">Nội dung liên hệ</label>
                <div class="col-sm-7 ">
                <textarea class="form-control" rows="15" id="content" name="content" placeholder="Nội Dung">{{ old('content') }}</textarea>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-sm-offset-3 col-sm-9 ">
                  <button type="button " class="btn btn-default ">Gửi</button>
                </div>
              </div>
            </div>
            </form>
          </div>

        </div>
      
    </div>
  </div>
  <div class="clearfix "></div>
</div>
</div>
@endsection
@section('footer')
<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
    <script>
jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                  phone_number.match(/^(\(?(0|\+84)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
        }, "Invalid phone number");
  
            $('#contact').validate({
                errorElement:"span",
            rules: {
                name:{
                    required  :true,
                    
                },
                phone:{
                    required  :true,
                    minlength : 9,
                    phoneUS   : true,
                    number    : true,
                   
                },
                email:{
                    required:true,
                    email :true,
                },
              },        
              messages:{
                name:{
                    required:'Vui lòng nhập họ tên!!!',
                    
                },   
                phone:{
                    required:'Vui lòng nhập số điện thoại',
                    minlength : "Số điện thoại phải có nhiều hơn 9 số",
                    phoneUS   : "Số điện thoại không đúng định dạng VD:(0|+84)999 999 999",
                    number : "Ký tự nhập vào phải là kiểu số",  

                },
                email:{
                    required:'Vui lòng nhập email',
                    email : "Email không đúng định dạng",
                },
          }
        }); 

</script>
        
@endsection