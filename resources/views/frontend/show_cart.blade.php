<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Youth TechEcom</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Youth <em>Tech</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              @if (Route::has('login'))
                  @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('show_cart') }}">Cart[{{ $count }}]</a>
                  </li>
                        <x-app-layout>

                        </x-app-layout>
                  @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>

                  @endauth
          @endif

            </ul>
          </div>
        </div>
      </nav>
    </header>
    {{-- cart table  --}}
    <div class="container-fluid" style="padding:200px">
        <div class="row">
            <div class="col-md-10">
                <table class="table table-striped table-bordered" >
                    <thead>    
                    <tr>
                        <td>Name</td>
                        <td>Number</td>
                        <td>Address</td>
                        <td>Brand_name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                    </tr>

                    </thead>
                    <form action="{{ url('order') }}" method="POST">
                      @csrf

                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td>
                                  {{ $cart->name }}</td>
                                <td>{{ $cart->number }}</td>
                                <td>{{ $cart->address }}</td>
                                <td>
                                  <input type="text" name="brand[]" value="{{ $cart->brand }}" hidden>
                                  {{ $cart->brand }}</td>
                                <td>
                                  <input type="text" name="price[]" value="{{ $cart->price }}" hidden>
                                  
                                  {{ $cart->price }}</td>
                                <td>
                                  <input type="text" name="quantity[]" value="{{ $cart->brand }}" hidden>
                                  
                                  {{ $cart->quantity }}</td>
                                <td>
                                    <a href="{{ url('delete_cart',$cart->id) }}" class="btn btn-danger btn-sm">delete</a>
                                </td>
                                <td></td> 
                            </tr>
                            
                        @endforeach
              

                    </tbody>
     
                </table>
                <button align="center" type="submit" class="btn btn-secondary btn-sm">Confirm Order</button>
              </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
