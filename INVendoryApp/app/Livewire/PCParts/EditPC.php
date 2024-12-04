<?php

namespace App\Livewire\PCParts;

use App\Livewire\Forms\PCForm;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Item;
use Livewire\Component;

class EditPC extends Component
{
    public $id;
    public Item $item; 
    public $pcform = []; 
    public $manufacturers = []; 
    public $category = [];
    public $item_name;
    public $item_price;
    public $item_quantity;
    public $category_id;
    public $manufacturer_id;

    public function mount($id=null)
    {
         // dd($this->pcform);
         $this->id = $id; // Store the ID
         $item = Item::findOrFail($this->id); // Get the item or fail
 
         // Populate the form data
         $this->pcform = $item->toArray(); 
         $this->item_name = $this->pcform['item_name'];
         $this->item_price = $this->pcform['item_price'];
         $this->item_quantity = $this->pcform['item_quantity'];
         $this->category_id = $this->pcform['category_id'];
         $this->manufacturer_id = $this->pcform['manufacturer_id'];

        $this->manufacturers = Manufacturer::all(); 
        $this->category = Category::all();
    }
    public function render()
    {
        
        return view('livewire.pcparts.editpc', [
            'category' => $this->category,
            'manufacturers' => $this->manufacturers,
        ]);
    }
    public function update()
    {
        $this->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'item_quantity' => 'required|integer',
            'category_id' => 'required|exists:category,id',
            'manufacturer_id' => 'required|exists:manufacturer,id',
        ]);

        // Update the item based on the form data
        $item = Item::findOrFail($this->id);
        $item->update([
            'item_name' => $this->item_name,
            'item_price' => $this->item_price,
            'item_quantity' => $this->item_quantity,
            'category_id' => $this->category_id,
            'manufacturer_id' => $this->manufacturer_id,
        ]);
        $item->update($this->pcform);

        flash()->success('Item updated successfully');
        return $this->redirect(IndexPC::class, navigate: true);
    }
}
