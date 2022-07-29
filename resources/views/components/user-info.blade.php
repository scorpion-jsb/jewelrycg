<div class="form-floating mb-3">
    <label for="floatingAddress">Address</label>
    <input type="text" name="address1" value="{{ auth()->user()->address->address ?? old('address1') }}" id="floatingAddress address1" class="form-control" required placeholder="Enter Address">
</div>
<div class="form-floating mb-3">
    <label for="floatingAddress2">Secondary Address</label>
    <input type="text" name="address2" value="{{ auth()->user()->address->address2 ?? old('address2') }}" id="floatingAddress2" class="form-control" placeholder="Enter Secondary Address (optional)">
</div>
<div class="form-floating mb-3">
    <label for="city" class="offset-md-1 col-sm-2 col-form-label">City</label>
    <div class="col-sm-8">
        <input type="text" name="city" value="{{ auth()->user()->address->city ?? old('city') }}" id="city"
            class="form-control" required placeholder="Enter City">
    </div>
</div>
<div class="form-floating mb-3">
    <label for="state" class="offset-md-1 col-sm-2 col-form-label">State</label>
    <div class="col-sm-8">
        <input type="text" name="state" value="{{ auth()->user()->address->state ?? old('state') }}" id="state"
            class="form-control" required placeholder="Enter State">
    </div>
</div>
<div class="form-floating mb-3">
    <label class="offset-md-1 col-sm-2 col-form-label" for="country">Country</label>
    <div class="col-sm-8">
        <select name="country" id="" data-live-search="true" class="form-control">
            @foreach ($countries as $country)
                @if (auth()->user()->address && auth()->user()->address->country == $country->code)
                    <option value="{{ $country->code }}" selected>{{ $country->name }}</option>
                @else
                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                @endif
            @endforeach
        </select>
        {{-- <input type="text" name="country" value="{{ auth()->user()->address->country ?? old('country') }}" id="country"
            class="form-control" required placeholder="Enter Country"> --}}
    </div>
</div>
<div class="form-floating mb-3">
    <label class="offset-md-1 col-sm-2 col-form-label" for="pin_code">PIN Code</label>
    <div class="col-sm-8">
        <input type="text" name="pin_code" value="{{ auth()->user()->address->postal_code ?? old('pin_code') }}"
            id="pin_code" class="form-control" required placeholder="Enter PIN Code">
    </div>
</div>
<div class="form-floating mb-3">
    <label class="offset-md-1 col-sm-2 col-form-label" for="phone">Phone Number</label>
    <div class="col-sm-8">
        <input type="tel" name="phone" value="{{ auth()->user()->address->phone ?? old('phone') }}" id="phone"
            class="form-control" placeholder="Enter Phone Number">
    </div>
</div>
