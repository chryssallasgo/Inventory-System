<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'pcpart_name',
        'pcpart_id'
    ];

    public function partcategory()
    {
        return $this->belongsTo(PartCategory::class, 'partcategory_id');
    }

    public function pcparts()
    {
        return $this->hasMany(PCPart::class);
    }
}
