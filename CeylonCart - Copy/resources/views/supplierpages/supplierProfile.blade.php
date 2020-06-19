@extends('layout.app')

@section('content')

@if(session()->has('message'))
 <div class="alert alert-success">
 {{ session()->get('message')}}
 </div>
 @endif
  
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading"  id="tabTitle"><b>My Profile</b>
</div>

<div class="form">



        <form action="" method="post">
        {{ csrf_field() }}
            @foreach ( $suppliers as $s1)
            @endforeach
              <label for="farmname">Farm Name</label>
							<input type="text" name="farmname" value= "{{$s1 -> farmName}}" required class ="form-control" readonly title ='Farm Name' placeholder="Enter Registered Farm Name">

            <label for="name">Name</label>
							<input type="text" name="name" value= "{{$s1 -> name}}" required class ="form-control" readonly title ='Company Name' placeholder="Enter Registered Company Name">

            <label for="nic">NIC</label>
							<input type="text" name="nic" value= "{{$s1 -> nic}}" required class ="form-control" readonly title='NIC number(Format:000000000V or 000000000X )' placeholder="Enter NIC Number">
          
              <label for="homeTown">Home Town</label>
							<input type="text" name="homeTown" value= "{{$s1 -> homeTown}}"required class ="form-control" readonly placeholder="Enter Home Town City">

              <label for="phoneNo">Email</label>
							<input type="tel" name="phoneNo" value= "{{$s1 -> phoneNo}}"required class ="form-control" placeholder="Enter Your Phone Number" title='(format: +94xx xxx xxxx)'>
						           
						<label for="accountNo">Account Number</label>
							<input type="text" name="accountNo" value= "{{$s1 -> accountNo}}"required class ="form-control" placeholder="Enter Bank Account Number">

              <label for="farmRegNo"> Farm Registration Number</label>
							<input type="text" name="farmRegNo" value= "{{$s1 -> farmRegNo}}"required class ="form-control" readonly placeholder="Enter  Farm Registration Number" >

						<label for="Address">Address</label>
							<input type="text" name="address" value= "{{$s1 -> address}}"required class ="form-control" readonly placeholder="Enter Postal Address">

            <label for="homeTown">Home Town</label>
							<input type="text" name="homeTown" value= "{{$s1 -> homeTown}}"required class ="form-control" readonly placeholder="Enter Home Town City">

              <label for="image">Image</label>
							<input type="file" name="file" value= "{{$s1 -> image}}"required class ="form-control" placeholder="Enter Profile image">
<!--
              <label for="location">Location</label>
							<input type="text" name="location" value= "{{$s1 ->location}}"required class ="form-control" readonly >
             --> 
      
              <label for="description" class="col-md-4 control-label">Description</label>

              <input type="text" name="description" value= "{{$s1 -> description}}"required class ="form-control"  placeholder="Short discription about the Supplier..." >                        
             <!-- <textarea name="description" rows="4" cols="50" placeholder="Short discription about the Supplier..." 
                required  class="msg form-control" value= "{{$s1 -> description}}"></textarea>
                      -->         
                                 

            
<br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href="/update/{{id}}" class ="btn btn-primary">Edit</a>
                            </div>
                        </div>
                        <div class="col-md-offset-10">
                <a href="{{ route('addProduct') }}" value ="addProduct"  name="addProduct">Next Item</a>
                             </div>

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