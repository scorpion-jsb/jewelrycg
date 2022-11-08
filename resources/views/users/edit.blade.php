<x-app-layout page-title="My Informations">
    <div class="container">
        <div class="row">
            <div class="w-20 py-9">
                <nav class="navbar bg-light navbar-light">
                    <div class="container-fluid">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ $tab == "account" ? "active" : "" }}" href="/user/edit?tab=account">Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $tab == "security" ? "active" : "" }}" href="{{route('user.update.password')}}">Security</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $tab == "address" ? "active" : "" }}" href="/user/edit?tab=address">Address</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-8 py-9 mx-auto">
                <form action="{{ route('user.update.'.$tab) }}" method="post">
                    @csrf
                    @method('put')

                    @if ($errors->any())
                        <div class="row justify-content-center mb-3">
                            <div class="card col-12">
                                <div class="card-body">
                                    @include('includes.validation-form')
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- {{ dd($countries) }} --}}
                    <x-user-info-main :edit="true" :user="auth()->user()" :countries="$countries" :shipping="$shipping" :billing="$billing" :tab="$tab" />
                    <div class="d-flex justify-content-end mt-3">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
