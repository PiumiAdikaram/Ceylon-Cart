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
<div class="panel-heading" id="tabTitle"><b>My Profile</b>
</div>

<div class="form">


         <form action="" method="post">
         {{ csrf_field() }}
            @foreach ($customers as $c1)
            @endforeach
           <!-- <label for="id">User ID</label>
              <input type="text" name="id" value= "{{$c1 -> id}}" class ="form-control" readonly scope="row" >
            -->
            <label for="cname">Company Registered Name</label>
							<input type="text" name="companyname" value= "{{$c1 -> companyname}}" required class ="form-control" readonly title ='Company Name' placeholder="Enter Registered Company Name">

              <label for="name">Full Name</label>
							<input type="text" name="name" value= "{{$c1 -> name}}"required class ="form-control" readonly title ='Person Name' placeholder="Enter Name With Initials">

            <label for="nic">NIC</label>
							<input type="text" name="nic" value= "{{$c1 -> nic}}"required class ="form-control" readonly pattern='^[0-9]{9}[vVxX]$' title='NIC number(Format:000000000V or 000000000X )' placeholder="Enter NIC Number">
          
						<label for="Phone">Phone Number</label>
							<input type='tel' name="phoneNo" value= "{{$c1 -> phoneNo}}"required class ="form-control" pattern="[0-9]{10}" title='Phone Number (Format: 000 000 0000)' placeholder="Enter Phone Number">
			
              <label for="email">Email</label>
							<input type="email" name="email" value= "{{$c1 -> email}}"required class ="form-control" placeholder="Enter Email Address" title='(format: xxx@xxx.xxx)'>

              <label for="regNo">Registration Number</label>
							<input type="text" name="regNo" value= "{{$c1 -> regNo}}"required class ="form-control" readonly placeholder="Enter Registration Number" >

						<label for="accountNo">Account Number</label>
							<input type="text" name="accountNo" value= "{{$c1 -> accountNo}}"required class ="form-control" placeholder="Enter Bank Account Number">

						<label for="Address">Address</label>
							<input type="text" name="address" value= "{{$c1 -> address}}"required class ="form-control" readonly placeholder="Enter Postal Address">

            <label for="homeTown">Home Town</label>
							<input type="text" name="homeTown" value= "{{$c1 -> homeTown}}"required class ="form-control" readonly placeholder="Enter Home Town City">

            <label for="image">Image</label>
							<input type="file" name="file" value= "{{$c1 -> image}}"required class ="form-control" placeholder="Enter Profile image">

<br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            
                            <a href="{{ url('customer.edit/'.$c1->id) }}" class ="btn btn-primary" >Edit</a>
                            </div>
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