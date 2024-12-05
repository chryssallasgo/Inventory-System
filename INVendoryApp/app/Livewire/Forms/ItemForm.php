<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public ?Item $item = null; // Initialize with null

    #[Validate]
    public $item_name;
    public $item_price;
    public $item_quantity;
    public $category_id;
    public $manufacturer_id;

    public function rules()
    {
        $rules = [
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
            'item_quantity' => 'required|numeric|min:0',
            'category_id' => 'required',
            'manufacturer_id' => 'required',
        ];

        if ($this->item) {
            // Modify rules based on existing item
            $rules['item_name'] = 'required|string|max:255|unique:item,item_name,' . $this->item->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The part category field is required',
            'manufacturer_id.required' => 'A manufacturer field is required',
        ];
    }

    public function setItem(Item $item)
    {
        $this->item = $item;
        $this->item_name = $item->item_name;
        $this->item_price = $item->item_price;
        $this->item_quantity = $item->item_quantity;
        $this->category_id = $item->category_id;
        $this->manufacturer_id = $item->manufacturer_id;
    }
    public function all() 
    { 
        return [ 
            'item_name' => $this->item_name, 
            'item_price' => $this->item_price, 
            'item_quantity' => $this->item_quantity, 
            'category_id' => $this->category_id, 
            'manufacturer_id' => $this->manufacturer_id, 
        ]; 
    }
}
