<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCPart extends Model
{
    use HasFactory;
    protected $table = 'pcpart';
    protected $fillable = [
        'pcpart_name',
        'pcpart_price',
        'partcategory_id',
        'manufacturer_id'

    ];

    public function partcategory()
    {
        return $this->belongsTo(PartCategory::class, 'partcategory_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function getFormattedPriceAttribute() 
    { 
        return '$' . number_format($this->pcpart_price, 2); 
    }
}
