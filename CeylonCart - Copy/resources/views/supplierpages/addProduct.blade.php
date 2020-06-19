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
                <div class="panel-heading"  id="tabTitle"><b> Add Product</b>
               </div>

                <div class="panel-body">
       
               <form action="addProduct" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
           
                        <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }}">
                            <label for="pname" class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                       
                    <input type="text" name="productName" class="form-control">
                                @if ($errors->has('pname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
     
                            <textarea rows="4" cols="50" placeholder="Short discription about the product..." 
                            required name="description" class="msg form-control"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                     
                         
                            <input type="file" name="image" class="form-control">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Add Product
                                </button>
                                
                            </div>
                            <a href="/supplierdash"  class="btn btn-primary">Skip</a>  
                        </div>


                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

