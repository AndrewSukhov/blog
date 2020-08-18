<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Category';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
 
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'external_id',
    ];
}
