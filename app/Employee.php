<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'EmployeeID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Title',
        'TitleOfCourtesy',
        'BirthDate',
        'HireDate',
        'Address',
        'City',
        'Region',
        'PostalCode',
        'Country',
        'HomePhone',
        'Extension',
        'Photo',
        'Notes',
        'ReportsTo',
        'Salary'
    ];

    protected $dates = ['BirthDate', 'HireDate'];

    public function getFullNameAttribute()
    {
        return $this->FirstName . ' ' . $this->LastName . ', ' . $this->TitleOfCourtesy;
    }

    public function getBirthDateAttribute($value)
    {
        return date_format(date_create($value), 'd-F-Y');
    }

    public function getHireDateAttribute($value)
    {
        return date_format(date_create($value), 'd-F-Y H:i:s');
    }

    public function getSalaryAttribute($value)
    {
        return '$ ' . number_format($value, 2, ',', '.');
    }
}
