<div class="form-group">
    <label for="{{ $id }}"> {{ $title }}</label>
    <textarea class="form-control" id="{{ $id }}" name="{{ $name ?? $id }}" cols="30" rows="10">{{ getSiteOption($id) }}</textarea>
</div>
