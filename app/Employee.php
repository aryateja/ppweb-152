<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
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
}
