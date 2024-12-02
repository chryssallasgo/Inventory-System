<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    use HasFactory;
    
    protected $table = 'partcategory';

    protected $fillable = [
        'pcpart_name'
    ];

    public function manufacturers()
    {
        return $this->hasMany(Manufacturer::class, 'partcategory_id');
    }
}
