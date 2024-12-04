<?php

namespace App\Livewire\PCParts;

use App\Livewire\Forms\PCForm;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Item;
use Livewire\Component;

class CreatePC extends Component
{
    public PCForm $PCform;
    //public Form $form;
 
    public $category;
    public $manufacturer = [];

    protected function rules()
    {
        return $this->PCform->rules();
    }


    public function render()
    {
        return view('livewire.pcparts.createpc',[
            'category' => Category::all()
        ]);
    }
    public function mount() 
    { 
        $this->manufacturer = Manufacturer::all(); 
        $this->category = Category::all();
    }

    public function updated($property)
    {
        if ($property === 'pcform.category_id') {
            $this->manufacturer = Manufacturer::where('category_id', $this->PCform['category_id'])->get();
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
