<x-app-layout>
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}"> --}}
  {{-- <script src="{{ asset('assets/js/mdb.min.js') }}"></script> --}}
  <style>
      .pur {
          width: 100%;
          margin-bottom: 8px;
      }
      .carousel {
        margin-bottom: 70px;
      }
      .carousel-indicators li {
        width: 120px;
        height: 100%;
        opacity: 0.8;
        margin: 0px 5px;
      }
      .carousel-indicators button[data-bs-target]{
        width: 120px;
      }
      .carousel-indicators button[data-bs-target]:not(.active){
        opacity: 0.8;
      }
      .carousel-indicators {
          position: static;
          margin-top: 10px;
      }
  </style>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-9">
      <div class="container">
          <div class="row">
            <div class="col-md-8">
                <h3>Service Detail</h3>
            </div>
            <div class="col-md-8 carousel mx-auto">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  @for ($i = 0; $i < count($service->galleries); ++$i)
                  <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                    <img src="/uploads/all/{{$service->galleries[$i]->file_name}}" class="d-block w-100" alt="..." />
                  </div>
                  @endfor
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < count($service->galleries); ++$i)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$i == 0 ? "active": "" }}">
                        <img src="/uploads/all/{{$service->galleries[$i]->file_name}}" class="d-block w-100">
                    </li>
                    @endfor
                </ol>
              </div>
            </div>
            <div class="col-md-8 mb-3">
              <h4>{{$service->name}}</h4>
            </div>
            <div class="col-md-8">
              <p>{{$service->content}}</p>
            </div>
            <div class="col-md-12 row">
              <h4>Packages</h4>
              <div class="col-span-5 col-md-3">
                Package
              </div>
              @foreach ($service->packages as $package)
              <div class="col-span-5 col-md-3">
                <h3>${{$package->price}}</h3>
                <h4>{{$package->name}}</h4>
                <p>{{$package->description}}</p>
                <p>{{$package->delivery_time}}</p>
                <p>{{$package->revisions}}</p>
              </div>
              @endforeach
            </div>
          </div>

      </div>
  </div>
</x-app-layout>