<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <label for="name">Name:</label>
            <input {{ $edit ? null : 'disabled' }} type="text" name="name" id="name" value="{{ old('name') ?? $user->name}}" placeholder="{{$user->name}}" class="form-control">
            <br>
            <label for="email">Email:</label>
            <input disabled type="text" id="email" value="{{$user->email}}" placeholder="{{$user->email}}" class="form-control">
            <br>
            <label for="phone">Phone Number:</label>
            <input {{ $edit ? null : 'disabled' }} type="tel" name="phone" id="phone" value="{{ old('phone') ?? $user->phone}}" placeholder="{{$user->phone}}" class="form-control">
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="address1">Address:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="address1" id="address1" value="{{ old('address1') ?? $user->address1}}" placeholder="{{$user->address1}}" class="form-control">
                    <br>        
                    <label for="city">City:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="city" id="city" value="{{ old('city') ?? $user->city}}" placeholder="{{$user->city}}" class="form-control">
                    <br>        
                    <label for="country">Country:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="country" id="country" value="{{ old('country') ?? $user->country}}" placeholder="{{$user->country}}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="address2">Secondary Address:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="address2" id="address2" value="{{ old('address2') ?? $user->address2}}" placeholder="{{$user->address2}}" class="form-control">
                    <br>
                    <label for="state">State:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="state" id="state" value="{{ old('state') ?? $user->state}}" placeholder="{{$user->state}}" class="form-control">
                    <br>
                    <label for="pin_code">PIN Code:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="pin_code" id="pin_code" value="{{ old('pin_code') ?? $user->pin_code}}" placeholder="{{$user->pin_code}}" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>