<div class="form-group">
    <label class="col-md-2 control-label" for="ProductName">Name</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="ProductName" name="ProductName" value="{{ isset($product->ProductName) ? $product->ProductName : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Category">Category</label>
    <div class="col-md-2">
        <select class="form-control" id="Category" name="CategoryID">
            @foreach($categories as $category)
                <option value="{{ $category->CategoryID }}" {{ isset($product) && ($category->CategoryID == $product->CategoryID) ? 'selected' : '' }}>{{ $category->CategoryName }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="Supplier">Supplier</label>
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon">PT.</span>
            <select class="form-control" id="Supplier" name="SupplierID">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->SupplierID }}" {{ isset($product) && ($supplier->SupplierID == $product->SupplierID) ? 'selected' : '' }}>
                        {{ $supplier->CompanyName }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="UnitPrice">Unit Price</label>
    <div class="col-md-2">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" class="form-control text-right" id="UnitPrice" name="UnitPrice" value="{{ isset($product->UnitPrice) ? $product->UnitPrice : 0 }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="QuantityPerUnit">Quantity Per Unit</label>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control text-right" id="QuantityPerUnit" name="QuantityPerUnit" value="{{ isset($product->QuantityPerUnit) ? $product->QuantityPerUnit : 0 }}">
            <span class="input-group-addon">pcs</span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="UnitsInStock">Units In Stock</label>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control text-right" id="UnitsInStock" name="UnitsInStock" value="{{ isset($product->UnitsInStock) ? $product->UnitsInStock : 0 }}">
            <span class="input-group-addon">pcs</span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="UnitsOnOrder">Units On Order</label>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control text-right" id="UnitsOnOrder" name="UnitsOnOrder" value="{{ isset($product->UnitsOnOrder) ? $product->UnitsOnOrder : 0 }}">
            <span class="input-group-addon">pcs</span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="ReorderLevel">Reorder Level</label>
    <div class="col-md-2">
        <div class="input-group">
            <input type="text" class="form-control text-right" id="ReorderLevel" name="ReorderLevel" value="{{ isset($product->ReorderLevel) ? $product->ReorderLevel : 0 }}">
            <span class="input-group-addon">pcs</span>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-3">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="Discontinued" {{ (isset($product->Discontinued) && ($product->Discontinued)) ? 'checked' : '' }}> Discontinued
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-6">
        @if (strpos(URL::current(), 'product/create') !== false)
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