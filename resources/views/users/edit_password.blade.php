<x-app-layout page-title="Edit Password">
<div class="py-9">
    <form action="{{route('user.update.password')}}" method="post">
        @csrf
        @method('patch')
        <div class="row justify-content-center mt-5">
            <div class="card">
                <div class="card-body">
                    @include('includes.validation-form')
                    <label for="old_password">Current Password:</label>
                    <input type="password" name="old_password" id="old_password" class="form-control">
                    <br>
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                    <br>
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-success">Edit Password</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</x-app-layout>
