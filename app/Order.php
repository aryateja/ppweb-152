<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'OrderID';

    public function purchased_by()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }

    public function issued_by()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID');
    }

    public function shipped_by()
    {
        return $this->belongsTo(Shipper::class, 'ShipVia');
    }

    public function purchased_products()
    {
        return $this->belongsToMany(Product::class, 'order details', $this->primaryKey, 'ProductID');
    }
}
