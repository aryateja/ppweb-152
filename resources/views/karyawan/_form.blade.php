<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('FirstName') ? 'has-error has-feedback' : '' }}">
            <label class="col-md-3 control-label" for="FirstName">First Name*</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="FirstName" name="FirstName" 
                        value="{{ old('FirstName') ? old('FirstName') : (isset($employee->FirstName) ? $employee->FirstName : '') }}">
                
                <?php echo $errors->first('FirstName', 
                                          '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="LastName">Last Name</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="LastName" name="LastName" 
                        value="{{ old('LastName') ? old('LastName') : (isset($employee->LastName) ? $employee->LastName : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Title">Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="Title" name="Title" 
                        value="{{ old('Title') ? old('Title') : (isset($employee->Title) ? $employee->Title : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="TitleOfCourtesy">Title Of Courtesy</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="TitleOfCourtesy" name="TitleOfCourtesy" 
                        value="{{ old('TitleOfCourtesy') ? old('TitleOfCourtesy') : (isset($employee->TitleOfCourtesy) ? $employee->TitleOfCourtesy : '') }}">
            </div>
        </div>

        <div class="form-group {{ $errors->has('BirthDate') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="BirthDate">Birth Date</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="BirthDate" name="BirthDate" 
                        value="{{ old('BirthDate') ? old('BirthDate') : (isset($employee->BirthDate) ? $employee->BirthDate : '1900-01-01') }}">

                <?php echo $errors->first('BirthDate', '<span class="help-block">:message</span>'); ?>
            </div>
        </div>

        <div class="form-group {{ $errors->has('HireDate') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="HireDate">Hire Date</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="HireDate" name="HireDate" 
                        value="{{ old('HireDate') ? old('HireDate') : (isset($employee->HireDate) ? $employee->HireDate : Carbon\Carbon::now()) }}">

                <?php echo $errors->first('HireDate', '<span class="help-block">:message</span>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Address">Address</label>
            <div class="col-md-9">
                <textarea class="form-control" id="Address" name="Address">{{ old('Address') ? old('Address') : (isset($employee->Address) ? $employee->Address : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="City">City</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="City" name="City" 
                        value="{{ old('City') ? old('City') : (isset($employee->City) ? $employee->City : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Region">Region</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="Region" name="Region" 
                        value="{{ old('Region') ? old('Region') : (isset($employee->Region) ? $employee->Region : '') }}">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="PostalCode">Postal Code</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="PostalCode" name="PostalCode" 
                        value="{{ old('PostalCode') ? old('PostalCode') : (isset($employee->PostalCode) ? $employee->PostalCode : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Country">Country</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="Country" name="Country" 
                        value="{{ old('Country') ? old('Country') : (isset($employee->Country) ? $employee->Country : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="HomePhone">Home Phone</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="HomePhone" name="HomePhone" 
                        value="{{ old('HomePhone') ? old('HomePhone') : (isset($employee->HomePhone) ? $employee->HomePhone : '') }}">
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-addon">Ext.</div>
                    <input type="text" class="form-control text-right" id="Extension" name="Extension" 
                            value="{{ old('Extension') ? old('Extension') : (isset($employee->Extension) ? $employee->Extension : '') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Notes">Notes</label>
            <div class="col-md-9">
                <textarea class="form-control" id="Notes" name="Notes" rows="5">{{ old('Notes') ? old('Notes') : (isset($employee->Notes) ? $employee->Notes : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="ReportsTo">Reports To</label>
            <div class="col-md-7">
                <select class="form-control" id="ReportsTo" name="ReportsTo">
                    @foreach($employees as $emp)
                        <option value="{{ $emp->EmployeeID }}" {{ isset($employee) && 
                                                                  ($emp->EmployeeID == (old('ReportsTo') ? old('ReportsTo') : $employee->ReportsTo)) ? 'selected' : '' }}>
                            {{ $emp->FirstName }} {{ $emp->LastName }}, {{ $emp->TitleOfCourtesy }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group {{ $errors->has('Salary') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="Salary">Salary</label>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input type="text" class="form-control text-right" id="Salary" name="Salary" 
                            value="{{ old('Salary') ? old('Salary') : (isset($employee->Salary) ? $employee->Salary : 0) }}">
                </div>
                <?php echo $errors->first('Salary', '<span class="help-block">:message</span>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Photo">Photo</label>
            <div class="col-md-2">
                <input type="file" id="Photo" name="Photo">
            </div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top: 10px;">
        <div class="form-group">
            <!-- <label class="col-md-3 control-label" for=""></label> -->
            <div class="col-md-9">
                @if (strpos(URL::current(), 'employee/create') !== false)
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
    </div>
</div>