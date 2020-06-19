@extends('customerlayouts.customerdashboard')
@section('content')


<div class="col-md-12">
@if(Session::has('success'))
 <div class="center" style="text-align: center;">
 <div class="alert alert-success">
     {{Session::get('success')}}
 </div>
</div>
 @endif

 
     
     <section class="row justify-content-center" >
            <div class="form-group">
                    @foreach($displayname as $display)
                   
                    
                   <h2> <center>{{$display->name}}</center></h2>
                   <center><img class="img-responsive" style="max-height: 20vh;" src="data:image;base64,{{$display->image}}" alt="image"></center>
               
               
                    @endforeach
                    </div>
    
     @foreach($onlysupplierreserved as $customer)
     <div class="col-sm-3">
                <div class="well">
              
                  <th><center><img class="img-responsive" style="max-height: 20vh;" src="data:image;base64,{{$customer->image}}" alt="image"></center></th>
              <br>
           
                  <span style="color:#00802b">Reserved Quantity :{{$customer->reserved_quantity}}</span>
                  <br>
                  <p style="color:#006600"><strong>Reserved Price: {{$customer->reserved_price}}</strong></p>
                 
                  
            
                    
                
                </div>
              </div>
              @endforeach
     

</div>
         </section>

        

        
 
        
</div>

@stop
