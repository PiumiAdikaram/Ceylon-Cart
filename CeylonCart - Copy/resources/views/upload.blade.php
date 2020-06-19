@extends('layouts.app')


@section('content')
<div class="container">
 
<form action="/uploaded" method="post"  enctype="multipart/form-data">

    {{csrf_field()}}
  <input type="text" class="form-group" name="productname" >
    <div class="form-group">
        <input type="file" class="form-group" name="file[]" multiple>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
@stop