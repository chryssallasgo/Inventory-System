<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'partcategory_id',
        'manufacturer_id',
        'pcpart_name',
        'pcpart_price'
    ];

    public function partcategory()
    {
        return $this->belongsTo(PartCategory::class, 'partcategory_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
