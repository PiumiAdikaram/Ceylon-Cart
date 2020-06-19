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

{!! Form::model($customer,['url'=>"update/".$customer->id,'method'=>'post'])!!}

            <label for="id">User ID</label>
            {!!Form::text('id',null,['class'=>'form-control','readonly'=>'true']);!!}
            
            <label for="companyname">Registered Name</label>
			    	{!!Form::text('companyname',null,['class'=>'form-control','readonly'=>'true']);!!}
              <label for="name">Name</label>

              {!!Form::text('name',null,['class'=>'form-control','readonly'=>'true']);!!}
            <label for="nic">NIC</label>
            {!!Form::text('nic',null,['class'=>'form-control','readonly'=>'true']);!!}
				
						<label for="Phone">Phone Number</label>
            {!!Form::text('phoneNo',null,['class'=>'form-control']);!!}
				
              <label for="email">Email</label>
              {!!Form::text('email',null,['class'=>'form-control']);!!}
			
              <label for="regNo">Registration Number</label>
              {!!Form::text('regNo',null,['class'=>'form-control','readonly'=>'true']);!!}
				
						<label for="accountNo">Account Number</label>
            {!!Form::text('accountNo',null,['class'=>'form-control']);!!}
			
						<label for="Address">Address</label>
            {!!Form::text('address',null,['class'=>'form-control','readonly'=>'true']);!!}
				
            <label for="homeTown">Home Town</label>
            {!!Form::text('homeTown',null,['class'=>'form-control','readonly'=>'true']);!!}
              
            <label for="image">Image</label>
            {!!Form::file('file',null,['class'=>'form-control']);!!}
							

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