
@extends('pageLayouts.supplierlayout')

@section('content')

<div class="col-sm-12">
  <div class="order_form">
    <h3></h3>
    <form action="/supplier/orders/reserve" method="post">
      {{csrf_field()}}
      <table class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price (Rs.)</th>
            <th>Order Qty. (kg)</th>
            <th>My Qty. (kg)</th>
          </tr>
        </thead>
        <tbody>@php
            $i=0;
        @endphp
          @foreach ($orderData as $orderData)
          @php
              $i++;
          @endphp
          <tr>
            <td> {{$orderData->product_name}}</td>
            <td> <input type="text" name="p{{$i}}" id="otext" value="{{$orderData->price}}" class="form-control" readonly></td>
            <td><input type="text" name="oq{{$i}}" id="otext" class="form-control" value="{{$orderData->quantity}}" readonly></td><!-- order qty-->
            <td><input type="text" name='n{{$i}}' id="otext" class="form-control" value="0"></td><!-- My qty-->
           <input type="hidden" name="id{{$i}}" value="{{$orderData->order_Id}}">
          </tr>
          @endforeach
        </tbody>
    </table>
      <input type="hidden" name="rowcount" value="{{$i}}">
      <input type="submit" value="reserve" class="btn btn-primary" style="float:right;">
    </form>
  </div>
</div>

@endsection