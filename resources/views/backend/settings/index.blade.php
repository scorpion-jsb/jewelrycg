@extends('backend.layouts.app', ['activePage' => 'page', 'title' => 'General Settings', 'navName' => 'addpost', 'activeButton' => 'blog'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">Settings</h1>
    </div>
    <!-- End Row -->
</div>

<form action="{{ route('backend.general.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">            
            <div class="card col-md-12 mb-4">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title mb-0">General</h4>
                </div>
                <!-- End Header -->
                <div class="card-body">
                    <div class="mb-2">
                        <label for="sitename" class="w-100 mb-2"> Site Name:</label>
                        <input type="text" name="sitename" id="sitename" value="{{ $data->sitename }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="meta_title" class="w-100 mb-2">Meta Title:</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ $data->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="meta_description" class="w-100 mb-2">Meta Description:</label>
                        <textarea name="meta_description" id="meta_description" rows="6" class="form-control">{{$data->meta_description}}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="twitter" class="w-100 mb-2">Twitter:</label>
                        <input type="text" name="twitter" id="twitter" value="{{ $data->twitter }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="facebook" class="w-100 mb-2">Instagram:</label>
                        <input type="text" name="facebook" id="facebook" value="{{ $data->instagram }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="instagram" class="w-100 mb-2">Facebook:</label>
                        <input type="text" name="instagram" id="instagram" value="{{ $data->facebook }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="youtube" class="w-100 mb-2">Youtube:</label>
                        <input type="text" name="youtube" id="youtube" value="{{ $data->youtube }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title mb-0">Stripe Settings</h4>
                </div>
                <!-- End Header -->
                <div class="card-body">
                    <div class="mb-2">
                        <label for="stripe_key" class="w-100 mb-2">Stripe Key:</label>
                        <input type="text" name="stripe_key" id="stripe_key" value="{{ $data->stripe_key }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="stripe_secret" class="w-100 mb-2">Stripe Secret:</label>
                        <input type="text" name="stripe_secret" id="stripe_secret" value="{{ $data->stripe_secret }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title mb-0">SMTP Settings</h4>
                </div>
                <!-- End Header -->
                <div class="card-body">
                    <div class="mb-2">
                        <label for="mail_mailer" class="w-100 mb-2">Mail Mailer:</label>
                        <input type="text" name="mail_mailer" id="mail_mailer" value="{{ $data->mail_mailer }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_host" class="w-100 mb-2">Mail Host:</label>
                        <input type="text" name="mail_host" id="mail_host" value="{{ $data->mail_host }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_port" class="w-100 mb-2">Mail Port:</label>
                        <input type="text" name="mail_port" id="mail_port" value="{{ $data->mail_port }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_username" class="w-100 mb-2">Mail Username:</label>
                        <input type="text" name="mail_username" id="mail_username" value="{{ $data->mail_username }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_password" class="w-100 mb-2">Mail Password:</label>
                        <input type="text" name="mail_password" id="mail_password" value="{{ $data->mail_password }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_encryption" class="w-100 mb-2">Mail Encryption:</label>
                        <input type="text" name="mail_encryption" id="mail_encryption" value="{{ $data->mail_encryption }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_from_address" class="w-100 mb-2">Mail From Address:</label>
                        <input type="text" name="mail_from_address" id="mail_from_address" value="{{ $data->mail_from_address }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="mail_from_name" class="w-100 mb-2">Mail From Name:</label>
                        <input type="text" name="mail_from_name" id="mail_from_name" value="{{ $data->mail_from_name }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title mb-0">Recaptcha Settings</h4>
                </div>
                <!-- End Header -->
                <div class="card-body">
                    <div class="mb-2">
                        <label for="recaptcha_site_key" class="w-100 mb-2">Recaptcha Site Key:</label>
                        <input type="text" name="recaptcha_site_key" id="recaptcha_site_key" value="{{ old('recaptcha_site_key') }}" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="recaptcha_secret_key" class="w-100 mb-2">Recaptcha Secret Key:</label>
                        <input type="text" name="recaptcha_secret_key" id="recaptcha_secret_key" value="{{ old('recaptcha_secret_key') }}" class="form-control">
                    </div>
                    <div class="mt-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-3 border border-blue-700 rounded">Save</button>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('js_content')
   
@endsection
