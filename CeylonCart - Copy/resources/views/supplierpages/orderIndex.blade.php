
@extends('pageLayouts.supplierlayout')

@section('content')

<script>
  
</script>

<div class="col-sm-12">
  <div class="order_form">

          
      
    @foreach ($orderData as $orderData)
          <form action="/supplier/orders/reserveOrder" method="post">
            <div class="form-group">
              <label for="name">myquantity:</label>
              <input type="text" class="form-control" id="myquantity">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" id="ajaxSubmit">
          </form>
    @endforeach    
         
   
  </div>
  
</div>

@endsection