<x-app-layout>
  <section style="background-color: #eee; padding-top: 80px;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-3">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ $seller->user->uploads->getImageOptimizedFullName(150) }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $seller->user->first_name . " " . $seller->user->last_name }}</h5>
              <p class="text-muted mb-1">{{ $seller->user->username }}</p>
              <p class="text-muted mb-4">{{ $seller->slogan }}</p>
              {{-- <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
              </div> --}}
            </div>
          </div>

          {{-- <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <p class="mb-0">https://mdbootstrap.com</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <p class="mb-0">@mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
              </ul>
            </div>
          </div> --}}
        </div>
        <div class="col-lg-9">
          <div class="row">
              @foreach ($products as $product)
              <div class="mb-4 col-lg-4 col-md-6 col-sm-12 p-2">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="{{ $product->uploads->getImageOptimizedFullName(400) }}" alt="avatar"
                      class="rounded-circle img-fluid" style="width: 100%;">
                    <h5 class="my-3">{{ $product->name }}</h5>
                    <p class="text-muted mb-1">{{ $product->description }}</p>
                    <p class="text-muted mb-4">{{ $product->product_category->name }}</p>
                  </div>
                </div>
              </div>
              @endforeach
              {{$products->appends(Arr::except(Request::query(), 'product'))->links()}}
          </div>
          
          <div class="row">
            @foreach ($services as $service)
            <div class="mb-4 col-lg-4 col-md-6 col-sm-12 p-2">
              <div class="card">
                <div class="card-body text-center">
                  <img src="{{ $service->uploads->getImageOptimizedFullName(400) }}" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 100%;">
                  <h5 class="my-3">{{ $service->name }}</h5>
                  <p class="text-muted mb-1">{{ $service->description }}</p>
                  <p class="text-muted mb-4">{{ join(',' , array_map(function ($item) {return $item['category']['category_name'];}, $service->categories->toArray())) }}</p>
                </div>
              </div>
            </div>
            @endforeach
            {{$services->appends(Arr::except(Request::query(), 'service'))->links()}}
        </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>