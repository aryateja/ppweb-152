<div class="form-group {{ $errors->has('CategoryName') ? 'has-error has-feedback' : '' }}">
    <label class="col-md-1 control-label" for="CategoryName">Name*</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="CategoryName" name="CategoryName" 
                value="{{ old('CategoryName') ? old('CategoryName') : (isset($category->CategoryName) ? $category->CategoryName : '') }}">
        <?php echo $errors->first('CategoryName', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
    </div>
</div>

<div class="form-group {{ $errors->has('Description') ? 'has-error has-feedback' : '' }}">
    <label class="col-md-1 control-label" for="Description">Description*</label>
    <div class="col-md-4">
        <textarea class="form-control" id="Description" name="Description">{{ old('Description') ? old('Description') : (isset($category->Description) ? $category->Description : '') }}</textarea>
        <?php echo $errors->first('Description', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-1 col-md-6">
        @if (strpos(URL::current(), 'category/create') !== false)
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span> Tambah Baru
            </button> 
        @else
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span> Simpan Perubahan
            </button> 
        @endif

        <button type="reset" class="btn btn-danger">
            <span class="glyphicon glyphicon-trash"></span> Batal
        </button>
    </div>
</div>