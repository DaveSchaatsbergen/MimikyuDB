<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- end of bootstrap --}}
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/7efd0841a1.js" crossorigin="anonymous"></script>
    {{-- end of font awesome --}}
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
</head>
<body>
    {{-- navbar --}}
    <header>
        <nav class="navbar navbar-dark">
            <a class="navbar-brand" href="{{url('/')}}"><b>MimikyuDB</b></a>
            {{-- search bar --}}
            <div class="input-group">
                <form class="search-form" action="/pokemon" method="post">
                    <input class="searchbar form-control py-2 border-right-0 border" type="search" placeholder="Type pokémon name or pokédex ID" id="input" name="pokemonName">
                    <span class="input-group-append">
                        <div class="input-group-text bg-transparent">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </span>
                    @csrf
                </form>
            </div>
            {{-- end of searchbar --}}
        </nav>
    </header>
    @yield('content')
    {{-- footer --}}
    
      <footer class="text-center text-white">
          <!-- Grid container -->
          <div class="container">
            <!-- Section: Social media -->
            <section>
        
              <!-- Linkedin -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="https://www.linkedin.com/in/daveschaatsbergen/"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-linkedin"></i
              ></a>
              <!-- Github -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="https://github.com/DaveSchaatsbergen"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-github"></i
              ></a>
            </section>
            <!-- Section: Social media -->
          </div>
          <!-- Grid container -->
        
          <!-- Copyright -->
          <div class="text-center text-dark p-3">
            © 2021 Copyright:
            <a class="text-dark" href="https://daveschaatsbergen.nl/">DaveSchaatsbergen.nl</a>
          </div>
          <!-- Copyright -->
      </footer>
      {{-- pokeball loading animation --}}
      <div class="loading_wrapper">
        <div class="pokeball">
            <div class="pokeball__button"></div>
        </div>
        Loading...
      </div>
      <script>
        jQuery(document).ready(function($) {
            $(window).on("load",function(){
                $(".loading_wrapper").fadeOut( "slow" );
            });
        });
      </script>
</body>
</html>