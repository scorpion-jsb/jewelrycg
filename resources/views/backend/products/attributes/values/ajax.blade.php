@foreach ($attributes as $attribute)
<option disabled> ---- Values for {{$attribute->name}} ---- </option>
    @foreach ($attribute->values as $value)
        <option value="{{ $value->id }}" data-tokens="{{ $value->name }}">
            {{$attribute->name}} : {{ $value->name }}</option>
    @endforeach
@endforeach