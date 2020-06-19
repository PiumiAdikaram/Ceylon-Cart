@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
 <head>
        <title>CEYLON CART</title>
        <meta charset="UTF-8">
        
          <style type="text/css">
    .dropdown-menu{
        position: relative;

    }

         .box{
          width:600px;
          margin:0 auto;
         }

         <style>
                .nav-item{
                  padding: 1vh;

                }

              .head {
                background: url('{{asset('images/head.jpg')}}') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
              }



              .container{
              padding: 25px;
              }

              .footer{

                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #e6ffe6;
                  }
                  .name{
                    margin-top:2vh;
                    padding: 2vh;
                   float:right;
                  }

                  .product_list{
                        margin:400px;
                    }


                    #product_list{
            z-index:9999;
            max-height:260px;
            width:95%;
            margin-top: 0.1%;
            }


                </style>
 </head>

 <body>
        <br />

@include('inc.navbar')


    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-12">
             <div class="head" style="height:60vh;"></div>

             <div class="jumbotron">
                <h1 class="display-4">Join Now</h1>
                <p class="lead">More often than not, a new ecommerce entrepreneur is thinking about a cool invention for solving problems somewhere around the house. Or maybe they're considering ways to source products for their online stores from China and amaze customers with service, speed, and quality.</p>
                <hr class="my-4">
                <p>Regardless of the type of food that you plan on sending out to customers, there are conventional rules to be followed. The easy part is thinking about what to sell, and it isn't that difficult configure your own online store.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
             </div>
           </div>
        </div>
    </div>


      <div class="container">
            <div class="row">
                    <center>
                            <div class="col-sm-8">

                                    @if (count($adData)>0)



                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                    <div class="carousel-item active">
                                                            <img class="d-block w-100" src="{{asset('images/add1.jpg')}}" alt="Second slide">
                                                    </div>
                                                    @foreach ($adData as $adData)


                                                    {{-- <img class="img-responsive" style="max-height: 30vh;" src="" alt="image"> --}}

                                                    <div class="carousel-item">
                                                            <img class="d-block w-100" src="data:image;base64,{{$adData->image}}" alt="Second slide">
                                                    </div>

                                                    @endforeach


                                            </div>
                                          </div>



                                    @else
                                        <p>No Advertisements found</p>
                                    @endif

                            </div>
                    </center>

            </div>
      </div>




      <footer>
          <div class="footer">
            <div class="container-fluid">
              <div class="row" style="padding:5vh;">
                <div class="col-sm-3">
                  <p><strong>Data Policy</strong></p>
                  <p>Terms and Conditions</p>
                </div>
                <div class="col-sm-3">
                    <p><strong>Help</strong></p>
                    <p>
                        FAQ
                    </p>
                </div>
                <div class="col-sm-3">
                    <p>
                        <strong>Contact Us</strong>
                    </p>
                    <i class="fa fa-phone" aria-hidden="true">07156587878</i><br>
                    <i class="fa fa-phone" aria-hidden="true">ceyloncart@gmail.com</i>

                </div>
                <div class="col-sm-3">
                    <p>
                      <strong>About</strong> <br>

                       copyright: ceylon cart (pvt) LTD
                    </p>
                </div>
              </div>
            </div>
          </div>
      </footer>

</body>

<script>
        $(document).ready(function(){

         $('#productName').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                  url:"{{ route('LiveSearch.fetch') }}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data){
                   $('#product_list').fadeIn();
                            $('#product_list').html(data);
                  }
                 });
                }
            });

            $(document).on('click', 'li', function(){
                $('#productName').val($(this).text());
                $('#product_list').fadeOut();
            });

        });
        </script>

</html>
@endsection
