<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'quantity',
        'price'

    ];

    public $timestamps = false;
    protected $table = 'products';

}
