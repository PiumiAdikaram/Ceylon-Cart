<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">
        
        <title>{{$title}}</title><!--888888888888888888888888888888888888888888-->
        <style>
            .btn-default{
               width: 100%;
               margin-bottom: 1vh
            }
        </style>
    </head>
    <header>
            @include('inc.navibar')
    </header>
    <body>
        
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              
            </div>
          </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="well">
                    <h4 style="text-align:center;color:white;background-color:seagreen;padding:2vh;">Administrator</h4>
                    <a href="/admin"><button type="submit" class="btn btn-default">Dashboard</button></a><br>
                    <a href="/admin/advertisements"><button type="submit" class="btn btn-default">Advertisements</button></a><br>
                    <a href="/admin/profile"><button type="submit" class="btn btn-default">Profile</button></a><br>
                    <a href="/admin/mailbox"><button type="submit" class="btn btn-default">E-mail</button></a><br>
                    <a href="/admin/products"><button type="submit" class="btn btn-default">Manage Products</button></a><br>
                    </div>
                </div>
                <div class="col-sm-9">
                        @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>