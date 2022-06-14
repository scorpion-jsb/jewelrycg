<x-app-layout page-title="My Informations">
    <form action="{{route('user.update')}}" method="post">
        @csrf
        @method('put')

        @if ($errors->any())
            <div class="row justify-content-center mb-3">
                <div class="card col-6">
                    <div class="card-body">
                        @include('includes.validation-form')
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <x-user-info-main :edit="true"/>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-outline-primary">Edit my informations</button>
                </div>
            </div>
        </div>    
    </form>
</x-app-layout>