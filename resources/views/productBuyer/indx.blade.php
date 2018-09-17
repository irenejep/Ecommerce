<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="main.js"></script>
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
                <a class="nav-link" href="#">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reviews</a>
            </li>
            <li class="nav-item">
            
                <a class="nav-link" href="/viewcart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light">{{$totalItems}}</span></a>
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
    <div class="container"> 
        <div class='text-center'>
            <div class='col-md-3 col-sm-6 hero-feature'>
                <div class="thumbnail">
                    <img src="images/{{$product->product_image}}" class='img-responsive' style='width:100%; height:200px' alt='Image'>
                    <div class='caption'><h4><b>{{$product->product_name}}</b></h4><div>
                    <div class="text-primary"> {{$product->product_status}}</div>
                    <div class='caption'>Price: KES <b>{{$product->product_price}}</b></div>
                    <div class='caption'>Description: {{$product->product_description}}</div>
                    <div class='caption'> <a href='/products/show/{{ $product->id }}'>See More</a></div>
                    <div class='caption'> 
                        <form action="/cart" method="post">
                            {{csrf_field()}}
                            <input type="hidden"name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="item" value="{{$product->product_name}}">
                            <input type="hidden"name="qty" value="{{$product->product_name}}">
                            <input type="hidden" name="price" value="{{$product->product_price}}">
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
    </div>
@endforeach
</body>
</html>
   
