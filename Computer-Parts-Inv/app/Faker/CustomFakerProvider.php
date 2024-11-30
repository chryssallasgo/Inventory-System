<?php
namespace App\Faker;

use Faker\Provider\Base;

class CustomFakerProvider extends Base
{
    protected $partcategory = [ 
        'GTX 1080' => 'GPU', 
        'Ryzen 5 3600' => 'CPU', 
        'Core i7-9700K' => 'CPU', 
        'B450M' => 'MOBO', 
        'Vengeance LPX' => 'RAM', 
        'EVO 860' => 'SSD', 
        'Barracuda' => 'HDD', 
        'CX550M' => 'PSU' 
    ];

    public function manufacturer()
    {
        $manufacturers = ['Nvidia', 'Intel', 'AMD'];    //'Gigabyte', 'Kingston', 'MSI', 'EVGA', 'ASUS', 'AsRock', 'Western Digital', 'Samsung'
         return $this->generator->randomElement($manufacturers);
    }

    public function pcpart_name() 
    { 
         return $this->generator->randomElement(array_keys($this->partcategory)); 
    } 
    public function partcategory($pcpartname) 
    {
         return $this->partcategory[$pcpartname] ?? 'Unknown'; 
    }
}

