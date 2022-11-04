<x-app-layout>
  <style>
      .pur {
          width: 100%;
          margin-bottom: 8px;
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
                  <h3>Services</h3>
              </div>
              <div class="col-md-4" style="text-align: right;">
                  <a class="btn btn-primary" type="button" href="{{route('seller.services.create')}}">Create Service</a>
              </div>
              <div class="col-md-12">
                <div class="row">
                  @foreach ($services as $service)
                  <div class="col-lg-3 col-md-4 mb-4 mb-lg-0">
                    <div class="card">
                      <img src="/uploads/all/{{ $service->thumb->file_name }}" class="card-img-top" alt="Peaks Against the Starry Sky" data-xblocker="passed" style="visibility: visible;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">
                          {{ $service->content }}
                        </p>
                        <ul class="list-unstyled d-flex justify-content-start align-items-center fs-6 mb-2">
                          <li>Category:</li>
                          @foreach ($service->categories as $item)
                          <li>
                            <div class="chip ms-3">{{ $item->category->category_name }}</div>
                          </li>
                          @endforeach
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-start align-items-center fs-6 mb-2">
                          <li>Seller Name:</li>
                          <li>
                            <div class="chip ms-3">{{ $service->postauthor->first_name." ".$service->postauthor->last_name }}</div>
                          </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-start align-items-center fs-6 mb-2">
                          <li>Seller Avatar:</li>
                          <li>
                            <div class="chip ms-3">{{ $service->postauthor->avatar }}</div>
                          </li>
                        </ul>
                        {{-- <ul class="list-unstyled d-flex justify-content-start align-items-center fs-6 mb-2">
                          <li>Seller Rate:</li>
                          <li>
                            <div class="chip ms-3">{{ $service->seller->sales_commission_rate }}</div>
                          </li>
                        </ul> --}}
                        <ul class="list-unstyled d-flex justify-content-start align-items-center fs-6 mb-2">
                          <li>Start Price:</li>
                          <li>
                            <div class="chip ms-3">{{ count($service->packages) ? "$".$service->packages[0]->price : "..." }}</div>
                          </li>
                        </ul>
                        <a href="#!" class="btn btn-primary">Details</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>


          </div>

      </div>
  </div>
</x-app-layout>