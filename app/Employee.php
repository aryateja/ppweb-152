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
        return date_format(date_create($value), 'Y-m-d');
    }

    public function getBirthDateFormattedAttribute()
    {
        return date_format(date_create($this->BirthDate), 'd-F-Y');
    }

    public function getHireDateFormattedAttribute()
    {
        return date_format(date_create($this->HireDate), 'd-F-Y');
    }

    public function getPhoneAttribute()
    {
        return $this->HomePhone . ' &mdash; ext. ' . $this->Extension;
    }

    public function getSalaryFormattedAttribute()
    {
        return '$ ' . number_format($this->Salary, 2, ',', '.');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'EmployeeID');
    }
}
