<?php
namespace App\Faker;

use Faker\Provider\Base;

class CustomFakerProvider extends Base
{
    protected $partcategory = [ 
        'Piatos' => 'Food', 
        'Clear Shampoo' => 'Necessities', 
        'Coca Cola' => 'Beverages',
        'Kulafu' => 'Beverages',
        'SafeGuard' => 'Necessities',
        'SkyFlakes' => 'Food',

    ];

    public function manufacturer()
    {
        $manufacturers = ['Coca Cola Company', 'Unilever', 'Monde M.Y. San Corporation'];    //'Gigabyte', 'Kingston', 'MSI', 'EVGA', 'ASUS', 'AsRock', 'Western Digital', 'Samsung'
         return $this->generator->randomElement($manufacturers);
    }

    public function item_name() 
    { 
         return $this->generator->randomElement(array_keys($this->partcategory)); 
    } 
    public function partcategory($item) 
    {
         return $this->partcategory[$item] ?? 'Unknown'; 
    }
}

