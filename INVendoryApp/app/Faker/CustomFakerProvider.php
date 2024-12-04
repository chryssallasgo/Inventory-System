<?php
namespace App\Faker;

use Faker\Provider\Base;

class CustomFakerProvider extends Base
{
    protected $category = [ 
        'Piatos' => 'Food', 
        'Clear Shampoo' => 'Necessities', 
        'Coca Cola' => 'Beverages',
        'Kulafu' => 'Beverages',
        'SafeGuard' => 'Necessities',
        'SkyFlakes' => 'Food',
        'Nestlé' => 'Food',
        'PepsiCo' => 'Beverages',
        'Kraft Heinz' => 'Food',
        'Dr Pepper Snapple Group' => 'Beverages',
        'Procter & Gamble' => 'Necessities',
        'Johnson & Johnson' => 'Necessities',
        'Monster Beverage Corporation' => 'Beverages',
        'Red Bull GmbH' => 'Beverages',
        'Kimberly-Clark' => 'Necessities',

    ];

    public function manufacturer()
    {
        $manufacturers = [
            'Coca Cola Company', 
            'Unilever', 
            'Monde M.Y. San Corporation',
            'Nestlé',
            'PepsiCo',
            'Kraft Heinz',
            'Dr Pepper Snapple Group',
            'Procter & Gamble',
            'Johnson & Johnson',
            'Monster Beverage Corporation',
            'Red Bull GmbH',
            'Kimberly-Clark',
        ];   
         return $this->generator->randomElement($manufacturers);
    }

    public function item_name() 
    { 
         return $this->generator->randomElement(array_keys($this->category)); 
    } 
    public function category($item) 
    {
         return $this->category[$item] ?? 'Unknown'; 
    }
}

