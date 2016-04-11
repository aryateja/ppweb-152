<div class="form-group">
    <label class="col-md-1 control-label" for="CategoryName">Name</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="CategoryName" name="CategoryName" value="{{ isset($category->CategoryName) ? $category->CategoryName : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-1 control-label" for="Description">Description</label>
    <div class="col-md-4">
        <textarea class="form-control" id="Description" name="Description">{{ isset($category->Description) ? $category->Description : '' }}</textarea>
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