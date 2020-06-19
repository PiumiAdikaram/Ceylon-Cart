<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!------ Include the above in your HEAD tag ---------->




 @extends('layouts.app')

@section('content')


<div class="container emp-profile">
        <form method="post">

@foreach ($supplierData as $supplierData)

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img class="img-responsive" style="max-height:30vh;" src="data:image;base64,{{$supplierData->image}}" alt="image">

                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
                                        {{$supplierData->name}}
                                </h5>
                                <h6>
                            {{$supplierData->phoneNo}}
                            <span class="glyphicon glyphicon-map-marker" style="margin-right:3vh;"></span>{{$supplierData->location}}
                            <span class="glyphicon glyphicon-map-marker" style="margin-right:3vh;"></span>{{$supplierData->email}}

                                </h6>
                                <p class="proile-rating">RATINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Services</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2">
                    <a href="/supplier/editprofile" class="btn btn-primary">Edit Profile</a>
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div>

                @foreach ($reservedData as $reservedData)
                    <a href="/supplier/myorders/{{$reservedData->order_refNo}}" class="btn btn-primary">Reserved Orders</a>
                @endforeach

            </div>

@endforeach

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">

                        <p>WORK LINK</p>
                        <a href="">Our Facebook Page Link</a><br/>
                        <a href="">Our Skills</a><br/>
                        <a href="">Working Team</a><br/>
                        <a href="">Why you should select our produsts</a>

                        <p>Chat Box</p>
                        <div class="card">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @foreach ($productData as $productData)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label>{{$productData->productName}}</label>
                                                          </div>
                                                    <div class="card-body">
                                                            <div class="row">
                                                                    <div class="col-sm-6">
                                                                            <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productData->product_image}}" alt="image">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                            <p>{{$productData->description}}</p>
                                                                    </div>
                                                                </div>
                                                    </div>
                                            </div>

                                        </div>

                                    </div><br><br>
                                @endforeach

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                  
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Future Works</label><br/>
                                    <p>Future Works..................................</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>



                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                                @if (count($commentData)>0)
                                    @foreach ($commentData as $commentData)
                                    <div class="media comment-box">
                                        <div class="media-left">
                                                <a href="#">
                                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                                </a>
                                        </div>

                                        <div class="media-body">

                                                <h4 class="media-heading">{{$commentData->name}}</h4>

                                                <p>{{$commentData->comment_body}}</p>

                                        </div>


                                    </div>
                            @endforeach

                            @else
                            <p><h5>No Comments Found !!!</h5></p>
                            @endif
                        </div>
                    </div>
                </div>

<hr>




@endsection

