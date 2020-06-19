@extends('layout.app')

@section('content')
                @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif
                 @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <h4>You are logged in as a Supplier in Ceylon Cart.com!</h4>
                    
                    <a href="{{ route('addProduct') }}">Add Product</a>
                   

                  <!-- <h2>This is Home Page</h2>
 <ul>
    <li>Full Name  :{{Auth::user()->name }}</li>
    <li>E-mail Address  :{{Auth::user()->email }}</li>

    <a href="{{ route('customer') }}" value ="customer"  name="customer">Customer Page</a>
<br>
    <a href="{{ route('supplier') }}" value ="supplier"  name="supplier">Supplier Page</a>
    <li><a href="{{ route('signout') }}">Log Out</a></li>
 </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--
<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" id="tabTitle"><b> Customer Registration</b>
               </div>

                <div class="panel-body">
                <div  class="col-md-8 col-md-offset-2">
 <h2>This is Home Page</h2>
 <ul>
    <li>NIC  :{{Auth::user()->nic }}</li>
   
    <li><a href="{{ route('signout') }}">Log Out</a></li>
 </ul>
 </div>
 </div>
 </div>
 </div>
 </div>
 
 </div>
@endsection
