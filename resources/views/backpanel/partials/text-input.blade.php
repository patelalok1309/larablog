<div class="form-group">
    <label for="{{$id}}">{{ $title }}</label>
    <input type="{{ $type ?? 'text'}}" name="{{$name ?? $id}}" id="{{$id}}" class="form-control" value="{{ getSiteOption($option ?? $id)}}">
</div>