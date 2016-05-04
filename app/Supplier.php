<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
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

    public function getCompanyNameAttribute($value)
    {
        return 'PT. ' . $value;
    }
}
