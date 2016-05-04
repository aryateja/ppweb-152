<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'CategoryID';
    
    protected $fillable = [
        'CategoryName',
        'Description'
    ];

    protected function products()
    {
        return $this->hasMany(Product::class, 'CategoryID');
    }
}
