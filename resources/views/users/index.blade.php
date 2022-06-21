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
        <--x-user-info-main :user="$user"/-->
    </div>
    
    @can('edit', $user)
        <div class="d-flex justify-content-end mt-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('user.edit.password')}}" class="btn btn-outline-dark">Change My Password</a>
                    <a href="{{route('user.edit')}}" class="btn btn-outline-success">Edit my informations</a>
                    <form action="{{route('user.delete')}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">
                            Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
