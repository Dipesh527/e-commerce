<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            @if (session()->has('message'))
            <div class="alert alert-success">
              <button type="button"  class="close" data-dismis="alert"></button>
              {{ session()->get('message') }}
            </div>
             
            @endif
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
            <form action="{{ url('search') }}" method="GET" class="form-inline" style="float: right">
              @csrf
              <input type="search" name="search"  placeholder="search" class="form-control" >
              <input type="submit" value="search"  class="btn btn-success">
            </form>
          </div>
        </div>
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="150px" width="50px" src="productimage/{{ $product->image }}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{ $product->brand }}</h4></a>
                <h6>{{ $product->price }}</h6>
                <p>{{ $product->description }}</p>
                <form action="{{ url('add_cart',$product->id) }}" method="POST">
                  @csrf
                  <input type="number" value="1" min="1" name="quantity">
                  <input class="btn btn-primary btn-sm" type="submit" value="Add Cart">
                </form>
        
              </div>
            </div>
          </div> 
        @endforeach
 
      </div>
    </div>
  </div>
