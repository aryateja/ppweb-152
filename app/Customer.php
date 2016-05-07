<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    
    protected $primaryKey = 'CustomerID';

    protected $fillable = [
        'CustomerID',
        'CompanyName',
        'ContactName',
        'ContactTitle', 
        'Address',
        'City',
        'Region',
        'PostalCode',
        'Country',
        'Phone',
        'Fax'
    ];

    public function setCustomerIdAttribute($value)
    {
        $this->attributes['CustomerID'] = strtoupper($value);
    }

    public function getCompanyNameFormattedAttribute()
    {
        return 'PT. ' . $this->CompanyName;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'CustomerID');
    }
}
