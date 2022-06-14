<div class="row mb-2">
    <div class="col-md-6">
        <label for="address1">address</label>
        <input type="text" name="address1" value="{{ auth()->user()->address1 ?? old('address1') }}" id="address1" class="form-control" placeholder="Enter Address">
    </div>
    <div class="col-md-6">
        <label for="address2">Secondary address</label>
        <input type="text" name="address2" value="{{ auth()->user()->address2 ?? old('address2') }}" id="address2" class="form-control" placeholder="Enter Secondary Address (optional)">
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <label for="city">City</label>
        <input type="text" name="city" value="{{ auth()->user()->city ?? old('city') }}" id="city" class="form-control" placeholder="Enter City">
    </div>
    <div class="col-md-6">
        <label for="state">State</label>
        <input type="text" name="state" value="{{ auth()->user()->state ?? old('state') }}" id="state" class="form-control" placeholder="Enter State">
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <label for="country">Country</label>
        <input type="text" name="country" value="{{ auth()->user()->country ?? old('country') }}" id="country" class="form-control" placeholder="Enter Country">
    </div>
    <div class="col-md-6">
        <label for="pin_code">PIN Code</label>
        <input type="text" name="pin_code" value="{{ auth()->user()->pin_code ?? old('pin_code') }}" id="pin_code" class="form-control" placeholder="Enter PIN Code">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" value="{{ auth()->user()->phone ?? old('phone') }}" id="phone" class="form-control" placeholder="Enter Phone Number">
    </div>
</div>
