<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
<div class="py-9">
    <div class="container">
        <div class="seller-dash-nav mb-4">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'seller.dashboard' ? 'active' :'' }}" href="{{ route('seller.dashboard') }}">Seller Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ \Route::currentRouteName() == 'dashboard' ? 'active' :'' }}" href="{{ route('dashboard') }}">User Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-3">
                <x-dashboard-side-bar />
            </div>
            <div class="col-9">
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
              <div>
                <div class="container">
                  <form action="{{ route('seller.profile.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                      <h1 class="card-header">Seller Information</h1>
                      <div class="row flex-row">
                        <div class="card-body">
                          <div class="mb-2">
                              <label for="slogan">Slogan:</label>
                              <input type="text" name="slogan" id="slogan" value="{{ old('slogan') ?? $seller->slogan }}"
                                  class="form-control">
                          </div>
                          <div class="mb-2">
                              <label for="about">About:</label>
                              <input type="text" name="about" id="about" value="{{ old('about') ?? $seller->about }}"
                                  class="form-control">
                          </div>
                          <div class="mb-2">
                              <label for="name">Default Payment Method:</label>
                              <select class="form-control" id="method" name="method" data-live-search="true" data-container="body">
                                @foreach ($payment_methods as $method)
                                    <option value="{{$method->id}}" data-id="{{$method->id}}" {{ $method->id == $seller->default_payment_method ? "selected" : "" }}>{{$method->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="card mb-4 p-0">
                            <div class="card-header">Avatar</div>
                            <div class="card-body">
                                <div class="col-md-4">
                                    <!-- Card -->
                                    <div class="imagePreview pt-2 img-thumbnail">
                                        <img id="fileManagerPreview" src="{{ $seller->user->uploads->getImageOptimizedFullName(200,200) }}" class="rounded-circle w-100">
                                    </div>
                                      <label class="btn btn-primary p-2 my-2" id="getFileManager">Select Avatar Image</label>
                                      <input type="hidden" value="{{ $seller->user->uploads->id}}" id="fileManagerId" name="avatar">
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </div>
                  </form>
                  <div id="fileManagerContainer"></div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
  
@section('js')
<script>
$(document).ready(function() {
    $('#getFileManager').click(function () {
      console.log("clicked");
        $.ajax({
            url: "{{ route('backend.file.show') }}",
            success: function (data) {
                if (!$.trim($('#fileManagerContainer').html()))
                    $('#fileManagerContainer').html(data);

                $('#fileManagerModal').modal('show');

                const getSelectedItem = function (selectedId, filePath) {

                    $('#fileManagerId').val(selectedId);
                    $('#fileManagerPreview').attr('src', filePath);
                }

                setSelectedItemsCB(getSelectedItem, $('#fileManagerId').val() == '' ? [] : [$('#fileManagerId').val()], false);
            }
        })
    });
});
</script>
@endsection

</x-app-layout>
