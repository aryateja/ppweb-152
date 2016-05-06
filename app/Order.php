<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'OrderID';

    protected $fillable = [
        'CustomerID',
        'EmployeeID',
        'OrderDate',
        'RequiredDate',
        'ShippedDate',
        'ShipVia',
        'Freight',
        'ShipName',
        'ShipAddress',
        'ShipCity',
        'ShipRegion',
        'ShipPostalCode',
        'ShipCountry'
    ];

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
        $p = new Product();

        return $this->belongsToMany(Product::class, 'order_details', $this->primaryKey, $p->getKeyName())
                    ->withPivot('UnitPrice', 'Quantity', 'Discount');
    }
}
