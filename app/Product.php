<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
}
