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

    public function getUnitPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function getUnitsInStockAttribute($value)
    {
        if ($value == 0) return 'out of stock';

        return $value . ' pcs';
    }

    public function getUnitsOnOrderAttribute($value)
    {
        if ($value == 0) return 'out of stock';

        return $value . ' pcs';
    }

    public function getReorderLevelAttribute($value)
    {
        if ($value == 0) return 'out of stock';
        
        return $value . ' pcs';
    }

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
        return $this->belongsToMany(Order::class, $this->primaryKey, 'OrderID');
    }
}
