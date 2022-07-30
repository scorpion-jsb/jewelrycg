<div class="form-floating mb-3">
    <label for="floatingAddress">Address</label>
    <input type="text" name="address1" value="{{ auth()->user()->address->address ?? old('address1') }}" id="floatingAddress address1" class="form-control" required placeholder="Enter Address">
</div>
<div class="form-floating mb-3">
    <label for="floatingAddress2">Secondary Address</label>
    <input type="text" name="address2" value="{{ auth()->user()->address->address2 ?? old('address2') }}" id="floatingAddress2" class="form-control" placeholder="Enter Secondary Address (optional)">
</div>
<div class="form-floating mb-3">
    <label for="floatingCity">City</label>
    <input type="text" name="city" value="{{ auth()->user()->address->city ?? old('city') }}" id="floatingCity city" class="form-control" required placeholder="Enter City">
</div>
<div class="form-floating mb-3">
    <label for="floatingState">State</label>
    <input type="text" name="state" value="{{ auth()->user()->address->state ?? old('state') }}" id="floatingState state" class="form-control" required placeholder="Enter State">
</div>
<div class="form-floating mb-3">
    <label for="floatingCountry">Country</label>
    <select name="country" id="floatingCountry" data-live-search="true" class="form-control">
        @foreach ($countries as $country)
            @if (auth()->user()->address && auth()->user()->address->country == $country->code)
                <option value="{{ $country->code }}" selected>{{ $country->name }}</option>
            @else
                <option value="{{ $country->code }}">{{ $country->name }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-floating mb-3">
    <label for="floatingZipcode">Zipcode</label>
    <input type="text" name="pin_code" value="{{ auth()->user()->address->postal_code ?? old('pin_code') }}" id="floatingZipcode pin_code" class="form-control" required placeholder="Enter PIN Code">
</div>
<div class="form-floating mb-3">
    <label for="floatingPhonenumber">Phone Number</label>
    <input type="tel" name="phone" value="{{ auth()->user()->address->phone ?? old('phone') }}" id="floatingPhonenumber phone" class="form-control" placeholder="Enter Phone Number">
</div>
