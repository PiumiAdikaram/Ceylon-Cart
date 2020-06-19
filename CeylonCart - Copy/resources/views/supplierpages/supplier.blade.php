

@extends('layout.app')

@section('content')



@section('script')
         
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
            $(document).ready(function(){
                $('#password,#password-confirm').on('keyup',function(){
                    if($('#password').val()==$('#password-confirm').val() ){
                        $('#message').html('Password Verified').css('color','green');
                    }else{
                        $('#message').html('Enter the same password').css('color','red');
                    
                    }
                });
      });
    
    </script>
@stop

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default"  >
                <div class="panel-heading" id="tabTitle"><b > Supplier Registration</b>
               </div>

                <div class="panel-body">
            
                     <div  class="col-md-8 col-md-offset-2">
                        <h5>
                        Sign up for Ceylon Cart.com <br>

                        If you shopped with us before, Please 
                        <a href="{{ route('cclogin') }}"class="link01">Sign in</a>
                        </h5>
                    <br>
                    </div>
          
       <form action="supplier" method="POST" enctype="multipart/form-data"]>
           {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('farmname') ? ' has-error' : '' }}">
                            <label for="farmname" class="col-md-4 control-label">Farm Name</label>

                            <div class="col-md-6">
                            <input type="text" name="farmname" value= "" required class ="form-control"  title ='Farm Name' placeholder="Enter Registered Farm Name">


                                @if ($errors->has('farmname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Farmer Name</label>

                            <div class="col-md-6">
                            <input type="text" name="name" value= "" required class ="form-control"  title ='Full Name' placeholder="Enter Your Full Name">


                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nic') ? ' has-error' : '' }}">
                            <label for="nic" class="col-md-4 control-label">Farmer NIC</label>

                            <div class="col-md-6">
                            <input type="text" name="nic" value= "" required class ="form-control"  title='NIC number(Format:000000000V or 000000000X )' placeholder="Enter NIC Number">

                                @if ($errors->has('nic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                            <label for="phoneNo" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                            <input type="tel" name="phoneNo" value= ""required class ="form-control" placeholder="Enter Your Phone Number" title='(format: +94xx xxx xxxx)'>
                                @if ($errors->has('phoneNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                            <input type="email" name="email" value= ""required class ="form-control" placeholder="Enter Your Phone Number" title='(format: +94xx xxx xxxx)'>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                                               
                        <div class="form-group{{ $errors->has('farmRegNo') ? ' has-error' : '' }}">
                            <label for="farmRegNo" class="col-md-4 control-label">Farm Registration Number</label>

                            <div class="col-md-6">
                            <input type="text" name="farmRegNo" value= ""required class ="form-control"  placeholder="Enter  Farm Registration Number" >

                                @if ($errors->has('farmRegNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('farmRegNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('accountNo') ? ' has-error' : '' }}">
                            <label for="accountNo" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-6">
                            <input type="text" name="accountNo" value= ""required class ="form-control" placeholder="Enter Bank Account Number">
                                @if ($errors->has('accountNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accountNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                            <input type="text" name="address" value= ""required class ="form-control"  placeholder="Enter Postal Address">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('homeTown') ? ' has-error' : '' }}">
                            <label for="homeTown" class="col-md-4 control-label">Home Town</label>

                            <div class="col-md-6">
                            <input type="text" name="homeTown" value= ""required class ="form-control"  placeholder="Enter Home Town City">
                                @if ($errors->has('homeTown'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('homeTown') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!--
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
    <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>
   @if(1)
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2283057070813!2d81.07561229554683!3d6.982363167274395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4618a1a9fec37%3A0x1dd900702229654b!2sUva+Wellassa+University!5e0!3m2!1sen!2slk!4v1511197231475"  width="90%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    @endif


                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="rating" class="col-md-4 control-label">Rating</label>

                            <div class="col-md-6">
                                <input id="rating" type="text" class="form-control" name="rating" value="{{ old('rating') }}" required autofocus>

                                @if ($errors->has('rating'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        -->

                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Enter the valied Password"  ,>
                               
                                <span id ="message"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Enter the Same Password">
                                <span id ="message"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    <!--image-->   <br>
                    

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                     
                           
                            <input type="file" name="image" class="form-control">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                     
                            <textarea name="description" rows="4" cols="50" placeholder="Short discription about the Supplier..." 
                              class="msg form-control"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <br>
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                                <input type="hidden" name="category" value="Supplier">
                        
                    
                </form>
               
                          
        </div>
    </div>
</div>
@endsection

