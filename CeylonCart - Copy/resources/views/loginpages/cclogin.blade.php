
@extends('layout.app')

@section('content')
                @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif

                 @if(session()->has('message2'))
                 <div class="alert alert-danger">
                 {{ session()->get('message2')}}
                 </div>
                 @endif
<div class="container-fluid" style=" background-image: url('images/cclogin.jpg'); 
  background-repeat: no-repeat; 
   width:100%;
   position:center;
   background-size:cover;
   height:545px;
   position:relative;">


    <div class="row" style="padding-top: 70px;" >
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background:rgba(0,0,0,0.4);color:white;">
                <div class="panel-heading" id="tabTitle">Login</div>

                <div class="panel-body">

                   <div  class="col-md-8 col-md-offset-2">
                   <h5>
                       If you shopped with us before, Please enter your Login name and password...
                    <br>
                    don’t have an account?
                       <a href="{{ route('category') }}" class="link01"> Register Now</a>
                   </h5>
                   <br>
                    </div>

        <form action="{{ route('cclogin') }}" method="post" class='form-horizontal'>
        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail Address</label>

                            <div class="col-md-6">
                               
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required  placeholder="Enter Your Email Address" title='(format: xxx@gmail.com)'>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                               
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus placeholder="Enter your password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" >
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                     
               </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection