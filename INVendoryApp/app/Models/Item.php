<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';
    protected $fillable = [
        'item_name',
        'item_price',
        'item_quantity',
        'category_id',
        'manufacturer_id'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function getFormattedPriceAttribute() 
    { 
        return '$' . number_format($this->item_price, 2); 
    }
}
