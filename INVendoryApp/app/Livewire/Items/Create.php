<?php

namespace App\Livewire\Items;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Item;
use Livewire\Component;

class Create extends Component
{
    public ItemForm $ItemForm;
    //public Form $form;
 
    public $category;
    public $manufacturer = [];

    protected function rules()
    {
        return $this->ItemForm->rules();
    }


    public function render()
    {
        return view('livewire.items.create',[
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
        if ($property === 'itemform.category_id') {
            $this->manufacturer = Manufacturer::where('category_id', $this->ItemForm['category_id'])->get();
        }

        // if($property === 'form.section_id'){
        //     dd($this->form->section_id);
        // }
    }

    public function store()
    {
        $validated = $this->ItemForm->validate();
        
       Item::create($validated);
        
       flash()->success('Item added successfully');
        
        return redirect()->route('items.index');
    }

}
