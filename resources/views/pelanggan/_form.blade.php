@if (strpos(URL::current(), 'create'))
    <div class="form-group {{ $errors->has('CustomerID') ? 'has-error has-feedback' : '' }}">
        <label class="col-md-2 control-label" for="CustomerID">Customer ID*</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="CustomerID" name="CustomerID" 
                    value="{{ old('CustomerID') }}">

            <?php echo $errors->first('CustomerID', 
                                      '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
        </div>
    </div>
@endif

<div class="form-group {{ $errors->has('CompanyName') ? 'has-error has-feedback' : '' }}">
    <label class="col-md-2 control-label" for="CompanyName">Company Name*</label>
    <div class="col-md-4">
        <div class="input-group">
            <div class="input-group-addon">PT.</div>
            <input type="text" class="form-control" id="CompanyName" name="CompanyName" 
                    value="{{ old('CompanyName') ? old('CompanyName') : (isset($customer->CompanyName) ? $customer->CompanyName : '') }}">
        </div>

        <?php echo $errors->first('CompanyName', 
                                  '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="ContactName">Contact Name</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="ContactName" name="ContactName" 
                value="{{ old('ContactName') ? old('ContactName') : (isset($customer->ContactName) ? $customer->ContactName : '') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="ContactTitle">Contact Title</label>
    <div class="col-md-3">
        <input type="text" class="form-control" id="ContactTitle" name="ContactTitle" 
                value="{{ old('ContactTitle') ? old('ContactTitle') : (isset($customer->ContactTitle) ? $customer->ContactTitle : '') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Address">Address</label>
    <div class="col-md-4">
        <textarea class="form-control" id="Address" name="Address">{{ old('Address') ? old('Address') : (isset($customer->Address) ? $customer->Address : '') }}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="City">City</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="City" name="City" 
                value="{{ old('City') ? old('City') : (isset($customer->City) ? $customer->City : '') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Region">Region</label>
    <div class="col-md-1">
        <input type="text" class="form-control" id="Region" name="Region" 
                value="{{ old('Region') ? old('Region') : (isset($customer->Region) ? $customer->Region : '') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="PostalCode">Postal Code</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="PostalCode" name="PostalCode" 
                value="{{ old('PostalCode') ? old('PostalCode') : (isset($customer->PostalCode) ? $customer->PostalCode : '') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Country">Country</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Country" name="Country" 
                value="{{ old('Country') ? old('Country') : (isset($customer->Country) ? $customer->Country : '') }}">
    </div>
</div>

<div class="form-group {{ $errors->has('Phone') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="Phone">Phone*</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Phone" name="Phone" 
                value="{{ old('Phone') ? old('Phone') : (isset($customer->Phone) ? $customer->Phone : '') }}">

        <?php echo $errors->first('Phone', '<span class="help-block">:message</span>'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Fax">Fax</label>
    <div class="col-md-2">
        <input type="text" class="form-control" id="Fax" name="Fax" 
                value="{{ old('Fax') ? old('Fax') : (isset($customer->Fax) ? $customer->Fax : '') }}">
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-6">
        @if (strpos(URL::current(), 'customer/create') !== false)
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