<?php

namespace App\Livewire\PCParts;

use App\Livewire\Forms\PCForm;
use App\Models\PartCategory;
use App\Models\Manufacturer;
use App\Models\Item;
use Livewire\Component;

class CreatePC extends Component
{
    public PCForm $PCform;
    //public Form $form;
 
    public $partcategory;
    public $manufacturers = [];

    protected function rules()
    {
        return $this->PCform->rules();
    }


    public function render()
    {
        return view('livewire.pcparts.createpc',[
            'partcategory' => PartCategory::all()
        ]);
    }
    public function mount() 
    { 
        $this->manufacturers = Manufacturer::all(); 
        $this->partcategory = PartCategory::all();
    }

    public function updated($property)
    {
        if ($property === 'pcform.partcategory_id') {
            $this->manufacturers = Manufacturer::where('partcategory_id', $this->PCform['partcategory_id'])->get();
        }

        // if($property === 'form.section_id'){
        //     dd($this->form->section_id);
        // }
    }

    public function store()
    {
        $validated = $this->PCform->validate();
        
       Item::create($validated);
        
       flash()->success('Item added successfully');
        
        return redirect()->route('pcparts.indexpc');
    }

}
