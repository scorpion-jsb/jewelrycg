<x-app-layout>
  <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
  <script src="{{ asset('assets/js/mdb.min.js') }}"></script>
  <style>
      .pur {
          width: 100%;
          margin-bottom: 8px;
      }
      .carousel {
        margin-bottom: 70px;
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
            <div class="col-md-12 carousel">
              <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                <!-- Slides -->
                <div class="carousel-inner mb-5">
                  @for ($i = 0; $i < count($service->galleries); ++$i)
                  <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                    <img src="/uploads/all/{{$service->galleries[$i]->file_name}}" class="d-block w-100" alt="..." />
                  </div>
                  @endfor
                </div>
                <!-- Slides -->
              
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators"
                  data-mdb-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators"
                  data-mdb-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                <!-- Controls -->
              
                <!-- Thumbnails -->
                <div class="carousel-indicators" style="margin-bottom: -20px;">
                  @for ($i = 0; $i < count($service->galleries); ++$i)
                  <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="{{$i}}" class="active"
                    aria-current="true" aria-label="Slide {{$i+1}}" style="width: 100px;">
                    <img class="d-block w-100"
                      src="/uploads/all/{{$service->galleries[$i]->file_name}}" class="img-fluid" />
                  </button>
                  @endfor
                </div>
                <!-- Thumbnails -->
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