<div class="row">
    <div class="col-md-6">
        <div class="input-group">
            <div class="custom-file">
                <label for="{{ $id }}" class="custom_file_lable">{{ $title }}</label>
                <input type="file" name="{{ $name ?? $id }}" id="{{ $id }}">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        @if ($logo !== null)
            <img src="{{ $logo }}" alt="logo" width="150px">
        @endif
    </div>
</div>
