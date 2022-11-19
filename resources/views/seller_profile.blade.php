<x-app-layout>
  <section class="py-9">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ $seller->user->uploads->getImageOptimizedFullName(150,150) }}" alt="avatar"
                class="rounded-circle img-fluid">
              <h5 class="my-3">{{ $seller->user->first_name . " " . $seller->user->last_name }}</h5>
              <p class="text-muted mb-1">{{ $seller->user->username }}</p>
              <p class="text-muted mb-4">{{ $seller->slogan }}</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal">Contact</button>
              </div>

            </div>
          </div>

        </div>
        <div class="col-lg-9">
          
          <div class="seller-products-card">
            <div class="seller-products-card-header fs-20 fw-700 mb-">Products</div>
            <div class="seller-products-card-body">
              <div class="row">
                  @foreach ($products as $product)
                  <div class="mb-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-body text-center">
                        <img src="{{ $product->uploads->getImageOptimizedFullName(400,400) }}" alt="{{ $product->name }}" class="w-100 img-fluid">
                        <h5 class="my-3">{{ $product->name }}</h5>
                        <p class="text-muted mb-1">{{ $product->description }}</p>
                        <p class="text-muted mb-4">{{ $product->product_category->name }}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
              {{$products->appends(Arr::except(Request::query(), 'product'))->links()}}
            </div>
          </div>
             
          <div class="seller-services-card">
            <div class="seller-services-card-header fs-20 fw-700 mb-">Services</div>
            <div class="seller-services-card-body">
              <div class="row">
                @foreach ($services as $service)
                <div class="mb-4 col-lg-4 col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-body text-center">
                      <img src="{{ $service->uploads->getImageOptimizedFullName(400,400) }}" alt="{{ $service->name }}" class="w-100 img-fluid">
                      <h5 class="my-3">{{ $service->name }}</h5>
                      <p class="text-muted mb-1">{{ $service->description }}</p>
                      <p class="text-muted mb-4">{{ join(',' , array_map(function ($item) {return $item['category']['category_name'];}, $service->categories->toArray())) }}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              {{$services->appends(Arr::except(Request::query(), 'service'))->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</x-app-layout>
