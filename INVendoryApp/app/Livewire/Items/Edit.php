<?php

namespace App\Livewire\Items;

use App\Livewire\Forms\ItemForm;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Item;
use Livewire\Component;

class Edit extends Component
{
    public $id;
    public Item $item; 
    public $itemform = []; 
    public $manufacturers = []; 
    public $category = [];
    public $item_name;
    public $item_price;
    public $item_quantity;
    public $category_id;
    public $manufacturer_id;

    public function mount($id=null)
    {
         // dd($this->itemform);
         $this->id = $id; // Store the ID
         $item = Item::findOrFail($this->id); // Get the item or fail
 
         // Populate the form data
         $this->itemform = $item->toArray(); 
         $this->item_name = $this->itemform['item_name'];
         $this->item_price = $this->itemform['item_price'];
         $this->item_quantity = $this->itemform['item_quantity'];
         $this->category_id = $this->itemform['category_id'];
         $this->manufacturer_id = $this->itemform['manufacturer_id'];

        $this->manufacturers = Manufacturer::all(); 
        $this->category = Category::all();
    }
    public function render()
    {
        
        return view('livewire.items.edit', [
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
        $item->update($this->itemform);

        flash()->success('Item updated successfully');
        return $this->redirect(Index::class, navigate: true);
    }
}
