<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'Product';
    
    protected $primaryKey = 'id';
    
    const CREATED_AT = 'creation_at';
    
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'name',
        'description',
        'creation_at',
        'price',
        'quantity',
        'category_id',
        'external_id',
    ];
}
