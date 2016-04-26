<div class="form-group">
    <label class="col-md-2 control-label" for="CompanyName">Company Name</label>
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon">PT.</span>
            <input type="text" class="form-control" id="CompanyName" name="CompanyName" value="{{ isset($shipper->CompanyName) ? $shipper->CompanyName : '' }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Phone">Phone</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Phone" name="Phone" value="{{ isset($shipper->Phone) ? $shipper->Phone : '' }}">
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-6">
        @if (strpos(URL::current(), 'shipper/create') !== false)
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span> Tambah Baru
            </button> 
        @else
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span> Simpan Perubahan
            </button> 
        @endif

        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</div>