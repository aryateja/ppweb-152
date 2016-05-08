<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'SupplierID';
    
    protected $fillable = [
        'CompanyName', 
        'ContactName', 
        'ContactTitle', 
        'Address', 
        'City', 
        'Region', 
        'PostalCode', 
        'Country', 
        'Phone', 
        'Fax', 
        'HomePage'
    ];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'SupplierID');
    }

    public function getCompanyNameFormattedAttribute()
    {
        return 'PT. ' . $this->CompanyName;
    }
}
