<div class="col-12">
    <div class="card">
        <div class="card-body">
            <label for="name">Name:</label>
            <input {{ $edit ? null : 'disabled' }} type="text" name="name" id="name" value="{{ old('name') ?? $user->first_name . ' ' .$user->last_name}}" placeholder="{{$user->first_name . ' ' .$user->last_name}}" class="form-control">
            <br>
            <label for="email">Email:</label>
            <input disabled type="text" id="email" value="{{$user->email}}" placeholder="{{$user->email}}" class="form-control">
            <br>
            <label for="phone">Phone Number:</label>
            <input {{ $edit ? null : 'disabled' }} type="tel" name="phone" id="phone" value="{{ old('phone') ?? $user->address->phonenumber}}" placeholder="{{$user->phonenumber}}" class="form-control">
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <label for="address1">Address:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="address1" id="address1" value="{{ old('address1') ?? $user->address->address}}" placeholder="{{$user->address->address}}" class="form-control">
                    <br>        
                    <label for="city">City:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="city" id="city" value="{{ old('city') ?? $user->address->city}}" placeholder="{{$user->address->city}}" class="form-control">
                    <br>        
                    <label for="country">Country:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="country" id="country" value="{{ old('country') ?? $user->address->country}}" placeholder="{{$user->address->country}}" class="form-control">
                    <br> 
                    <label for="address2">Secondary Address:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="address2" id="address2" value="{{ old('address2') ?? $user->address->address2}}" placeholder="{{$user->address->address2}}" class="form-control">
                    <br>
                    <label for="state">State:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="state" id="state" value="{{ old('state') ?? $user->address->state}}" placeholder="{{$user->address->state}}" class="form-control">
                    <br>
                    <label for="pin_code">PIN Code:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="pin_code" id="pin_code" value="{{ old('pin_code') ?? $user->address->postal_code}}" placeholder="{{$user->address->postal_code}}" class="form-control">
 
            </div>
        </div>
    </div>
</div>
