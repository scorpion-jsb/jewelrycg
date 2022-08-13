<div class="col-12">
    <div class="card">
        <div class="card-body">
            @if ($edit)
                <div class="mb-2">
                    <label for="name">First Name:</label>
                    <input type="text" name="first_name" id="first_name"
                        value="{{ old('first_name') ?? $user->first_name }}" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name"
                        value="{{ old('last_name') ?? $user->last_name }}" class="form-control">
                </div>
            @else
                <div class="mb-2">
                    <label for="name">Name:</label>
                    <input {{ $edit ? null : 'disabled' }} type="text" name="name" id="name"
                        value="{{ old('name') ?? $user->first_name . ' ' . $user->last_name }}"
                        placeholder="{{ $user->first_name . ' ' . $user->last_name }}" class="form-control">
                </div>
            @endif
            <div class="mb-2">
                <label for="email">Email:</label>
                <input disabled type="text" id="email" value="{{ $user->email }}"
                    placeholder="{{ $user->email }}" class="form-control">
            </div>
            <div class="mb-2">
                <label for="phone">Phone Number:</label>
                <input {{ $edit ? null : 'disabled' }} type="tel" name="phone" id="phone"
                    value="{{ old('phone') ?? $user->phone }}" placeholder="{{ $user->phone }}"
                    class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="mb-2">
                <label for="address1">Address:</label>
                <input {{ $edit ? null : 'disabled' }} type="text" name="address1" id="address1"
                    value="{{ old('address1') ?? $user->address->address }}"
                    placeholder="{{ $user->address->address }}" class="form-control">
            </div>
            <div class="mb-2">
                <label for="city">City:</label>
                <input {{ $edit ? null : 'disabled' }} type="text" name="city" id="city"
                    value="{{ old('city') ?? $user->address->city }}" placeholder="{{ $user->address->city }}"
                    class="form-control">
            </div>
            <div class="mb-2">
                <label for="country">Country:</label>
                <input {{ $edit ? null : 'disabled' }} type="text" name="country" id="country"
                    value="{{ old('country') ?? $user->address->country }}"
                    placeholder="{{ $user->address->country }}" class="form-control">
            </div>
            <div class="mb-2">
                <label for="address2">Secondary Address:</label>
                <input {{ $edit ? null : 'disabled' }} type="text" name="address2" id="address2"
                    value="{{ old('address2') ?? $user->address->address2 }}"
                    placeholder="{{ $user->address->address2 }}" class="form-control">
            </div>
            <div class="mb-2">
                <label for="state">State:</label>
                <input {{ $edit ? null : 'disabled' }} type="text" name="state" id="state"
                    value="{{ old('state') ?? $user->address->state }}" placeholder="{{ $user->address->state }}"
                    class="form-control">
            </div>
            <div class="mb-2">
                <label for="pin_code">PIN Code:</label>
                <input {{ $edit ? null : 'disabled' }} type="text" name="pin_code" id="pin_code"
                    value="{{ old('pin_code') ?? $user->address->postal_code }}"
                    placeholder="{{ $user->address->postal_code }}" class="form-control">
            </div>
        </div>
    </div>
</div>
