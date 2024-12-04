<?php

namespace App\Livewire\PCParts;
use App\Livewire\Forms\PCForm;
use App\Models\Manufacturer;
use App\Models\PartCategory;
use App\Models\Item;

use Livewire\Component;

class EditPC extends Component
{
   
    public Item $item;
    public PCForm $pcform;
    public $partcategory = [];
    public $manufacturers = [];

    public function mount(Item $item)
    {  
        $this->item = $item;
        $this->pcform = new PCForm($this, [ 
            'item_name' => $item->item_name, 
            'item_price' => $item->item_price, 
            'item_quantity' => $item->item_quantity, 
            'partcategory_id' => $item->partcategory_id, 
            'manufacturer_id' => $item->manufacturer_id, 
        ]);
        $this->partcategory = PartCategory::all();
        $this->manufacturers = Manufacturer::all();
    }
    protected function rules() { 
        return [ 
            'pcform.item_name' => 'required|string|max:255', 
            'pcform.item_price' => 'required|numeric|min:0', 
            'pcform.item_quantity' => 'required|numeric|min:0', 
            'pcform.partcategory_id' => 'required|exists:partcategory,id', 
            'pcform.manufacturer_id' => 'required|exists:manufacturer,id', 
        ]; 
    }
    public function render()
    {
        return view('livewire.pcparts.editpc', [
            'partcategory' => $this->partcategory,
            'manufacturers' => $this->manufacturers,
        ]);
    }

    public function updated($property)
    {
        if ($property === $this->pcform->partcategory_id) {
            $this->manufacturers = Manufacturer::where('partcategory_id', $this->pcform->partcategory_id)->get();
        }

        // if($property === 'form.section_id'){
        //     dd($this->form->section_id);
        // }
    }

    public function update()
    {
     
        // Validate form data
        $validated = $this->validate(); 
        
        // Map the validated data to the model 
        $this->item->item_name = $this->pcform->item_name; 
        $this->item->item_price = $this->pcform->item_price; 
        $this->item->item_quantity = $this->pcform->item_quantity; 
        $this->item->partcategory_id = $this->pcform->partcategory_id; 
        $this->item->manufacturer_id = $this->pcform->manufacturer_id; 
        
        // Update the record in the database $this->item->save();
        $this->item->save();
        // Provide success message
        flash()->success('Item updated successfully');
    
        // Redirect to the index page
        return redirect()->route('pcparts.indexpc');
    }
    
}