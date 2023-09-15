@if(count($items) > 0)
    @foreach($items as $item)
        <option value="{{ $item->id }}" {{($selected && ($item->id == $selected) ) ? 'selected' : '' }}>{{ $item->name }}</option>
    @endforeach
@endif