
@php  $siteSetting = \App\Models\Setting::all(); @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <meta name="description" content="@yield('metaDescription', 'Default Description')">
    <meta name="keywords" content="@yield('metaKeywords', 'blog')">
    <meta property="og:url" content="@yield('metaUrl', 'http://127.0.0.1:8000/')">
    <meta name="author" content="@yield('metaTitle', 'Zahid Akbar')">



    <title>{{ $siteSetting[0]->key_value ?? env('name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .blog-image{
            max-height: 400px;
        }
        .home-blog-image{
          height: 200px;
        }
        .blog-title{
            text-decoration: none !important;
            color: black;
        }
    </style>
</head>
<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 bg-light">
                <nav class="navbar navbar-expand-lg navbar-light p-4">
                    <a class="navbar-brand" href="{{ url('/') }}"><img style="max-width: 250px;max-height: 120px;" src="{{ $siteSetting[1]->key_value }}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">

                        @if($siteSetting[4]->key_value == "on")
                          <li class="nav-item active">
                            <a class="nav-link text-uppercase" href="{{ url('/') }}">Home</a>
                          </li>
                        @endif

                        @if($siteSetting[5]->key_value == "on")
                          <li class="nav-item active">
                            <a class="nav-link text-uppercase" href="#">About</a>
                          </li>
                          @endif
                        
                        @if($siteSetting[2]->key_value == "on")
                            @php  $categories = \App\Models\Category::where("status", "active")->get(); @endphp
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                <li class="nav-item">
                                  <a class="nav-link text-uppercase" href="{{ url('search-blog',$category->category_name) }}">{{ $category->category_name }}</a>
                                </li>
                                @endforeach
                            @endif
                            @endif
                      </ul>
                     
                        <form class="form-inline my-2 my-lg-0">
                          @if(!empty(Auth::user()))
                              <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/backend/categories') }}">Dashboard</a>
                          @else
                          @if($siteSetting[3]->key_value == "on")
                              <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/login') }}">Login</a>
                              @endif
                          @endif
                        </form>
                    </div>
                  </nav>
            </div>
        </div>
    </div>

    @yield("content")

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>
