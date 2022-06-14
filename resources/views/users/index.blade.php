<x-app-layout page-title="My Informations">

    @if (session('message'))
        <div class="row justify-content-center">
            <div class="card col-md-6 mb-3">
                <div class="card-body text-success text-center">
                    {{session('message')}}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <x-user-info-main/>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <div class="card">
            <div class="card-body">
                <a href="{{route('user.edit.password')}}" class="btn btn-outline-dark">Change My Password</a>
                <a href="{{route('user.edit')}}" class="btn btn-outline-success">Edit my informations</a>
            </div>
        </div>
    </div>
</x-app-layout>