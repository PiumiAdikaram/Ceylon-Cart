@extends('layout.app')

@section('content')
                @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif
                 @section('content')
<div class="container">
    
<div class="col-md-4">     
    <a href="{{ route('addProduct') }}" class="btn btn-primary">Add Product</a>
                    
</div>
       

        <div class="col-md-6 col-md-offset-4" >
            <div class="panel panel-default">
                <div class="panel-heading">Supplier Dashboard</div>

                        <div class="panel-body">
                    @if (session('status'))
                            <div class="alert alert-success">
                            {{ session('status') }}
                            </div>
                    @endif
                        <h4>You are logged in as a Supplier in Ceylon Cart.com!</h4>
           
                        </div>
                </div>
            </div>
        </div>
   


         
  


    <div class="col-md-6 col-md-offset-4">
    
    </div> 
</div>
</div>
@endsection