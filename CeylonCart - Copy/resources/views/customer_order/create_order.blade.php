
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

 
     <form action="/h" method="POST" class="form-container" >
         {{csrf_field()}}
         <div class="form-group">
         <div class="col-md-5">
                         </div>
                </div>
</br>
</br>

<div class="form-group">
         <section class="row justify-content-center">
        
               
                <span>
               
         <table  class="table table-border" style="overflow-x:auto;"  >
    <thead style="background-color:#00b33c ;color:black;position:center; text-align:center;font-weight: bold;" align="center" >
                         <tr>
                             <th>Product Name</th>
                      
                             <th>Quantity (Kg)</th>
                             <th>Price (Rs)</th>
                           
                           <th><button class="btn btn-info"><a href="#" class="addRow" ><i class="glyphicon glyphicon-plus"></i></a></th>
                         </tr>
                     </thead>
                     <tbody>
         <tr>
         <td>
         <select class="form-control" id="sell" name="product_name[]">
  @foreach($productname as $item)
   
  <option value="{{$item->id}}">{{$item->productimagename}}</option>



            @endforeach
            </select>
</td>
 
           <td><input type="number" name="quantity[]" class="form-control quantity" required="" placeholder="Enter Quantity"></td>
           <td><input type="number" name="price[]" class="form-control budget" required="" placeholder="Enter Price"></td>
         
         <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
         </tr>
                         </tr>
                     </tbody>
                   
                 </table>
                </span>
          
                 <input type="submit" name="" value="Create Order" class="btn btn-primary">
            

         
         </section>
        </div>
        
   

     </form>

   
</div>
    </div>
            
               

@section('script')


<script type="text/javascript">


 


 $('.addRow').on('click',function(){
     addRow();
 });
 function addRow()
 {
     var tr='<tr>'+
     '<td>'+
      '<select class="form-control" id="sell"  name="product_name[]" >'+
   '@foreach($productname as $item)'+
    '<option value="{{$item->id}}">{{$item->productimagename}}</option>'+
    '@endforeach'+
    '</select>'+
    '</td>'+

     '<td><input type="text" name="quantity[]" class="form-control quantity" required="" placeholder="Enter Quantity"></td>'+
     '<td><input type="text" name="price[]" class="form-control budget" placeholder="Enter Price"></td>'+

     '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
     '</tr>';
     $('tbody').append(tr);
 };
 $('.remove').live('click',function(){
     var last=$('tbody tr').length;
     if(last==1){
         alert("you can not remove last row");
     }
     else{
          $(this).parent().parent().remove();
     }
 
 });


</script>
@stop

@endsection