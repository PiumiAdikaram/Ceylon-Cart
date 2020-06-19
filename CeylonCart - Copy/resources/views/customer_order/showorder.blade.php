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
    
       
      
      
      <table class="table table-bordered"  id="example" class="display nowrap" style="width:100%" >
    <thead style="background-color:#00b33c ;color:black;position:center; text-align:center;font-weight: bold;" align="center" >

                         <tr>

                             <th>Product Name </th>
                             <th>Product Image </th>
                             <th >Quantity (Kg)</th>
                             <th >Price (Rs)</th>
                          
                             <th ></th>
                             <th ></th>
                             <th ></th>
                          
                            
                         </tr>

                     </thead>
                     <tbody>
                     @foreach($customer_data as $customer)
                    
                     <tr>
                     <th><center>{{$customer->productimagename}}</center></th>
                     <th><center><img class="img-responsive" style="max-height: 20vh;" src="data:image;base64,{{$customer->image}}" alt="image"></center></th>
                     <form action="/upadtedata" method="POST" class="form-container" >
                     {{csrf_field()}}
                     <th><center><input type="text" name="price" class="form-control" value="{{$customer->price}}" /></center></th>
                     <th><center><input type="text" name="quantity" class="form-control" value="{{$customer->productinitial_quantity}}" /></center></th>
                   
                     <input type="hidden" name="id" class="form-control" value="{{$customer->id}}" />
                     <th><button type="submit" class="btn btn-warning">Update</button></th>
                     </form>
                    
                  <th><a href ="/delete/{{$customer->id}}" class="btn btn-danger" >Delete</a></th>
                  <th><a href ="/reservedsppliers/{{$customer->id}}" class="btn btn-primary" >Reserved Suppliers</a></th>
                  
                     </tr>
                     @endforeach
             
                     
                     </tbody>

                     </table>
                   

</div>
         </section>

        

        
 
        
</div>

@endsection
@section('script')


<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );


</script>
@stop