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
<div class="panel-heading">My Profile</div>

<div class="panel-body">





            <form action="" method="post">
            {{ csrf_field() }}
            @foreach ( $suppliers as $s1)
            
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
            <label for="description">Description</label>
      
          <input type="text" name="description" value= "{{$s1 -> description}}"required class ="form-control"  placeholder="Short discription about the Supplier..." >                        
          @endforeach
         
     <br>
       <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" 
            onclick="return confirm ('Are You sure to update these fields in your Profile?')">
            Save Changes
            </button>
            </div>
        </div>
 
        {!! Form::close() !!}
    <!--</form>-->
        </div>
      </div>
    </div>
  </div>
</div>

@endsection