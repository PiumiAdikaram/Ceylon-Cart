<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><div class="container">
        <div class="panel panel-default">
@foreach ($searchdata as $searchdata )

            {{-- <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$searchdata->image}}" alt="image">

                <br/> --}}

                {{-- <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header"><a href="/suppliers/{{$searchdata->supplierId}}">{{$searchdata->productName}}</a></div>
                        <div class="card-body text-primary">
                          <h5 class="card-title">{{$searchdata->phoneNo}}</h5>
                          <p class="card-text">{{$searchdata->location}}</p>
                        </div>
                      </div> --}}

<div class="card" style="margin-bottom:3vh">
        <div class="card-body">

                              <div class="panel-body">
                               <div class="row">

                                <div class="col-sm-6">
                                    <div class="card">
                                            <div class="card-body">
                                        <ul class="list-group">
                                                <h4 class="card-title"><a href="/suppliers/{{$searchdata->supplierId}}">{{$searchdata->name}}</a></h4>
                                                <p class="card-text"><a href="/suppliers/{{$searchdata->supplierId}}"><img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$searchdata->image}}" alt="image"></a></p>
                                        </ul>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                 <div class="card-body">
                                        <h4 class="card-title"><a href="/suppliers/{{$searchdata->supplierId}}">{{$searchdata->productName}}</a></h4><br>
                                        <p class="card-text"><span class="glyphicon glyphicon-phone-alt" style="margin-right:3vh;"></span>{{$searchdata->phoneNo}}</p>
                                        <p class="card-text"><span class="glyphicon glyphicon-map-marker" style="margin-right:3vh;"></span>{{$searchdata->location}}</p>
                                        <p class="card-text"><span class="glyphicon glyphicon-info-sign" ></span><span  style="margin-left:3vh;">{{$searchdata->supplier_description}}</span></p>
                                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                        </div>

                                </div>

                            </div>



                    </div>

                </div>




            </div>

@endforeach

</div>
</div>

