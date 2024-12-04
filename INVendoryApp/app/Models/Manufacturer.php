<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacturer';

    protected $fillable = [
        'name',
        'partcategory_id'
    ];

    public function partcategory()
    {
        return $this->belongsTo(PartCategory::class, 'partcategory_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
