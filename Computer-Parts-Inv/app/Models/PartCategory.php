<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pcpart_name'
    ];

    public function sections()
    {
        return $this->hasMany(Manufacturer::class, 'partcategory_id');
    }
}
