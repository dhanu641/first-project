@extends('common')
@include('nav_bar')
<body>
  @yield('nav_bar')
  
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="padding-top:50px;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item  active" id="item1">
            {{-- <img src="{{asset("assets/3.jpg")}}" class="d-block w-100" alt="..."> --}}
            <div class="container my-5 py-3 ">
              <p class="display-5 fw-bold">new collections</p>
              <h2 class=" display-5 fw-bold">Amazing Product</h2><br>
              <p style="width:400px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum eligendi sunt veritatis necessitatibus nostrum illum provident ullam, illo quod esse recusandae assumenda atque magnam fugiat et voluptatem commodi, porro blanditiis!</p>
              <button class="btn  p-3 " style="background-color:#323edd;">shop now</button>
          </div>
          </div>
          <div class="carousel-item d-flex justify-content-end " id="item2">
            {{-- <img src="{{asset("assets/3.jpg")}}" class="d-block w-100" alt="..."> --}}
              <div class="container align-content-center " style="width: 50px;">
                <p class="display-5 fw-bold">new collections</p>
                <h2 class=" display-5 fw-bold">Amazing Product</h2><br>
                <p style="width:400px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum eligendi sunt veritatis necessitatibus nostrum illum provident ullam, illo quod esse recusandae assumenda atque magnam fugiat et voluptatem commodi, porro blanditiis!</p>
                <button class="btn px-3 " style="background-color:#323edd;">shopnow</button>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div>
       
        <div class="container">
          <h2>category</h2>
          <div class="container d-flex flex-wrap gap-3">
            @foreach ($categories as $category)
            <a href="{{route("products",$category->id)}}">
            <div class="card " style="height:300px; width:300px">
                <img src="{{asset($category->image)}}" alt="not found" style="height:200px;width:300px;">
                <div class="card-body">
                  <h5 class="card-title">{{$category->title}}</h5>
                  <h5 class="card-title">{{$category->description}}</h5>
              </div>
            </div>
          </a>
          @endforeach
          </div>
         
        </div>
      </div>

</body>
