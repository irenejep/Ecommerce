<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <title>ecommerce</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button"  data-toggle="dropdown">
                    Products
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/productsBuyer">All Products</a>
                        <a class="dropdown-item" href="/features"> Features</a>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="ordersbuyer">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reviews</a>
            </li>
            <li class="nav-item">
            
                <a class="nav-link" href="/viewcart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light"></span></a>
            </li>
            <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
    </div>
</nav>

@foreach($products as $product)
        <div class='text-center'>
            <div class='col-md-4 col-sm-6 hero-feature'>
                <div class="thumbnail">
                    <img src="images/{{$product->product_image}}" class='img-responsive' style='width:100%; height:200px' alt='Image'>
                    <div class='caption'><h4><b>{{$product->product_name}}</b></h4><div>
                    <div class="text-primary"> {{$product->product_status}}</div>
                    <div class='caption'>Price: KES <b>{{$product->product_price}}</b></div>
                    <div class='caption'>Description: {{$product->product_description}}</div>
                    <div class='caption'> <a class = "btn btn-success"href='/products/show/{{ $product->id }}'>Details</a></div>
                    <div class='caption'> 
                        <form action="/cart/{{$product->id }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden"name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="product_name" value="{{$product->product_name}}">
                            <input type="hidden"name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="price" value="{{$product->product_price}}">
                            <input type="hidden" name="seller_id" value="{{$product->user_id}}">
                            <input type="hidden" name="order_status_id" value="1">
                            <button type="submit" class="btn btn-primary">Add to cart</button>
                        </form>
                    </div>
                    <!-- <form action="addtocart/{{$product->id}}" method="post">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form> -->
                </div>
            </div>
        </div>
@endforeach
    <div class="container">
    @if(count($errors))
    <div class = "alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($message = session("success_message"))
      <div id = "form-success"class ="alert alert-success">
      {{$message}}
      </div>
    @endif

    @if($message = session("success_message_edit"))
      <div id = "form-success-edit"class ="alert alert-success">
      {{$message}}
      </div>
    @endif

     @if($message = session("success_message_delete"))
      <div id = "form-success-delete"class ="alert alert-success">
      {{$message}}
      </div>
    @endif

    @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script> 
  </body>
</html>