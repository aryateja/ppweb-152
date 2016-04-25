<div class="form-group">
    <label class="col-md-2 control-label" for="CompanyName">Company Name</label>
    <div class="col-md-4">
        <div class="input-group">
            <div class="input-group-addon">PT.</div>
            <input type="text" class="form-control" id="CompanyName" name="CompanyName" value="{{ isset($supplier->CompanyName) ? $supplier->CompanyName : '' }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="ContactName">Contact Name</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="ContactName" name="ContactName" value="{{ isset($supplier->ContactName) ? $supplier->ContactName : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="ContactTitle">Contact Title</label>
    <div class="col-md-3">
        <input type="text" class="form-control" id="ContactTitle" name="ContactTitle" value="{{ isset($supplier->ContactTitle) ? $supplier->ContactTitle : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Address">Address</label>
    <div class="col-md-4">
        <textarea class="form-control" id="Address" name="Address">{{ isset($supplier->Address) ? $supplier->Address : '' }}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="City">City</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="City" name="City" value="{{ isset($supplier->City) ? $supplier->City : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Region">Region</label>
    <div class="col-md-1">
        <input type="text" class="form-control" id="Region" name="Region" value="{{ isset($supplier->Region) ? $supplier->Region : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="PostalCode">Postal Code</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="{{ isset($supplier->PostalCode) ? $supplier->PostalCode : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Country">Country</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Country" name="Country" value="{{ isset($supplier->Country) ? $supplier->Country : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Phone">Phone</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Phone" name="Phone" value="{{ isset($supplier->Phone) ? $supplier->Phone : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Fax">Fax</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Fax" name="Fax" value="{{ isset($supplier->Fax) ? $supplier->Fax : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="HomePage">HomePage</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="HomePage" name="HomePage" value="{{ isset($supplier->HomePage) ? $supplier->HomePage : '' }}">
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-6">
        @if (strpos(URL::current(), 'supplier/create') !== false)
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