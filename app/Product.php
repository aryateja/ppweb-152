<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductID';
    
    protected $fillable = [
        'ProductName', 
        'SupplierID',
        'CategoryID',
        'QuantityPerUnit', 
        'UnitPrice', 
        'UnitsInStock', 
        'UnitsOnOrder', 
        'ReorderLevel', 
        'Discontinued'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'SupplierID');
    }

    public function ordered_on()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getUnitPriceFormattedAttribute()
    {
        return number_format($this->UnitPrice, 2, ',', '.');
    }

    public function getUnitsInStockFormattedAttribute()
    {
        if ($this->UnitsInStock == 0) return 'out of stock';

        return $this->UnitsInStock;
    }

    public function getUnitsInStockPcsAttribute()
    {
        if ($this->UnitsInStock == 0) return 'out of stock';

        return $this->UnitsInStock . ' pcs';
    }

    public function getUnitsOnOrderPcsAttribute()
    {
        if ($this->UnitsOnOrder == 0) return 'out of stock';

        return $this->UnitsOnOrder . ' pcs';
    }

    public function getReorderLevelPcsAttribute()
    {
        if ($this->ReorderLevel == 0) return 'out of stock';
        
        return $this->ReorderLevel . ' pcs';
    }

    public function getDiscontinuedFormattedAttribute()
    {
        if ($this->Discontinued)
            return 'OUT OF ORDER';
        else
            return 'CONTINUE';
    }
}
