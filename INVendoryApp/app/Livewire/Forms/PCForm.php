<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PCForm extends Form
{
    public ?Item $item;

    #[Validate]
    public $item_name;
    public $item_price;
    public $item_quantity;
    public $partcategory_id;
    public $manufacturer_id;

    public function rules()
    {
        return [
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
            'item_quantity' => 'required|numeric|min:0',
            'partcategory_id' => 'required|exists:partcategory,id',
            'manufacturer_id' => 'required|exists:manufacturer,id',
        ];
    }

    public function messages()
    {
        return [
            'partcategory_id.required' => 'The part category field is required',
            'manufacturer_id.required' => 'A manufacturer field is required',
        ];
    }

    public function setItem(Item $item)
    {
        $this->item = $item;
        $this->item_name = $item->item_name;
        $this->item_price = $item->item_price;
        $this->item_quantity = $item->item_quantity;
        $this->partcategory_id = $item->partcategory_id;
        $this->manufacturer_id = $item->manufacturer_id;
    }

    public function all()
    {
        return [
            'item_name' => $this->item_name,
            'item_price' => $this->item_price,
            'item_quantity' => $this->item_quantity,
            'partcategory_id' => $this->partcategory_id,
            'manufacturer_id' => $this->manufacturer_id,
        ];
    }
}
