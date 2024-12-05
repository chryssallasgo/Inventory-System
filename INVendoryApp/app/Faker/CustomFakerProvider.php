<?php
namespace App\Faker;

use Faker\Provider\Base;

class CustomFakerProvider extends Base
{
    protected $category = [ 
        'Piattos' => 'Food', 
        'Clear Shampoo' => 'Necessities', 
        'Coca Cola' => 'Beverages',
        'Red Bull Energy' => 'Beverages',
        'SafeGuard' => 'Necessities',
        'SkyFlakes' => 'Food',
        'Kit Kat' => 'Food',
        'Pepsi' => 'Beverages',
        'Kraft Macaroni & Cheese' => 'Food',
        '7UP' => 'Beverages',
        'Gillette' => 'Necessities',
        'Listerine' => 'Necessities',
        'Monster Energy' => 'Beverages',
        'Red Bull Zero' => 'Beverages',
        'Kleenex' => 'Necessities',
        'Nissin Cup Noodles' => 'Food',

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
            'Universal Robina Corporation',
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

