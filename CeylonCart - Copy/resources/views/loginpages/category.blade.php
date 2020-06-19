@extends('layout.app')

@section('content')

@if(session()->has('message'))
 <div class="alert alert-success">
 {{ session()->get('message')}}
 </div>
 @endif
  
 @section('script')

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
@stop



<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">

<div class="panel-heading" id="tabTitle"><b>Select Your Category</b>
</div>

<div class="panel-body">

<form action="" method="post">
{{ csrf_field() }}
    <div class="form-group">
            <div class="col-md-8 ">
            
             <div class="popup" onclick="myFunction()">
                    <span class="popuptext" id="myPopup">Click me If you are a Customer </span>
            </div>
             <a href="{{ route('customer') }}" value ="Customer" class="btn btn-primary" name="category">Customer</a>                                          
             </div>
    </div>
    <div class="form-group">
            <div class="col-md-8 ">
            <div class="popup" onclick="myFunction()"> 
            <span class="popuptext" id="myPopup">Click me If you are a Supplier </span>
            </div>
            <a href="{{ route('supplier') }}" value ="Supplier" class="btn btn-primary" name="category">Supplier</a>   
                
            
            </div>
    </div>
    </div>

</form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection