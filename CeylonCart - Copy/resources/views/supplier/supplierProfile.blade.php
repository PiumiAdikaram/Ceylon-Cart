<head>
    <link rel="stylesheet" href="{{asset('css/comment.css')}}">
    <link rel="stylesheet" href="{{asset('css/userprofile.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <style>

</style>
</head>
<!------ Include the above in your HEAD tag ---------->


 @extends('layouts.app')

@section('content')


<div class="container emp-profile">
        <form method="post">

@foreach ($supplierData as $supplierData)

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                            <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$supplierData->image}}" alt="image">
                        {{-- <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div> --}}
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

                {{-- <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div> --}}

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

                    <form action="/comments" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="comment"><h3>What do you think about our products?</h3></label>
                        <input type="text" class="form-control" id="comment_body" placeholder="Enter Your Comment Here" name="comment_body">
                        <input type="hidden" name="supplierId" value="{{$supplierId}}">
                        </div>

                      <input type="submit" class="btn btn-primary" name="submit" value="Post"/>
                    </form>
                  </div>



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

