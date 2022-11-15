<x-app-layout page-title="My Orders">
  <div class="container">
      <div class="col-lg-8 col-md-10 py-8 mx-auto checkout-wrap">
        @if (session('success'))
          <h4 class="text-center text-primary mt-3">
              {{session('success')}}
          </h4>
        @endif
        @if (session('error'))
          <h4 class="text-center text-danger mt-3">
              {{session('error')}}
          </h4>
        @endif
        <form action="{{ route('services.review.post') }}" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-12">
                  @csrf
                  <div class="card col-md-12 mb-4">
                      <!-- Header -->
                      <div class="card-header">
                          <h4 class="card-header-title mb-0">Leave review to {{$order->user->first_name . " " . $order->user->last_name}}</h4>
                          <input type="hidden" name="order_id" value="{{ $order->id }}">
                      </div>
                      <!-- End Header -->
                      <div class="card-body">
                          @include('includes.validation-form')
                          <div class="mb-4">
                              <label for="rating" class="w-100 mb-2">Rating:</label>
                              <input type="number" name="rating" id="rating" max="5" step="0.01" min="0" value="{{ $order->review ? $order->review->rating/100 : 0 }}" class="form-control" required>
                          </div>
               
                          <div class="mb-4 col-12">
                              <label for="method" class="w-100 mb-2">About Service</label>
                              <textarea name="review" class="form-control">{{ $order->review ? $order->review->review : ""}}</textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">Save Review</button>
                      </div>
                  </div>
              </div>
          </div>
        </form>
      </div>
  </div>
  </x-app-layout>