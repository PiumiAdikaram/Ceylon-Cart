@extends('layout.app')

@section('content')

                @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif

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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" id="tabTitle"><b> Customer Registration</b>
               </div>
    
                <div class="panel-body">
                <div  class="col-md-8 col-md-offset-2">
                 
              <!--   
                <form action="/h" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="image" >

    
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
</form>   
              -->   
                 
                 
                   <h5>
                Sign up for Ceylon Cart.com <br>

                If you shopped with us before, Please 
                     <a href="{{ route('cclogin') }}" class="link01">Sign in</a>
                </h5>
                   <br>
               </div>
            
            <form action="customer" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                            <label for="companyname" class="col-md-4 control-label">Registered Company Name</label>

                            <div class="col-md-6">
                                                        
<input type="text" name="companyname" class="form-control" placeholder="Enter Your Company Name" required>
                                @if ($errors->has('companyname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('customerName') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Customer Name</label>

                            <div class="col-md-6">
                           
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name"  ,required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nic') ? ' has-error' : '' }}">
                            <label for="nic" class="col-md-4 control-label">Customer NIC</label>

                            <div class="col-md-6">
                     
                                
                                <input type="text" name="nic" class="form-control" placeholder="Enter Your NIC Number" required
                                 title="xxxxxxxxxV">
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
                          
                            <input type="text" name="phoneNo" class="form-control" placeholder="Enter Your Mobile Number" 
                            required>
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
                         
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('regNo') ? ' has-error' : '' }}">
                            <label for="regNo" class="col-md-4 control-label">Registration Number</label>

                            <div class="col-md-6">
                           
                                    <input type="text" name="regNo" class="form-control" placeholder="Enter Your Company Registerd Number" required>
                                @if ($errors->has('regNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('accountNo') ? ' has-error' : '' }}">
                            <label for="accountNo" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-6">
                           
                                    <input type="text" name="accountNo" class="form-control" placeholder="Enter Your Bank Account Number" required>
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
                           <input type="text" name="address" class="form-control" placeholder="Enter Your Postal Address" required>
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
                            
                            <input type="text" name="homeTown" class="form-control" placeholder="Enter Your Home Town" required>
                                @if ($errors->has('homeTown'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('homeTown') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter the valied Password" required>
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Enter the same Password">
                                <span id ="message"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


  <br>
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


                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

<input type="hidden" name="category" value="Customer">
                        
                  </form>
                </div>
            </div>
            @if(count($errors)>0)
                   <div class ="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    </div>
                 @endif
        </div>
    </div>
</div>
@endsection

