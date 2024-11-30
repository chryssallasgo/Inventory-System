<?php

namespace App\Livewire\PCParts;

use App\Livewire\Forms\PCForm;
use App\Models\PartCategory;
use App\Models\Manufacturer;
use App\Models\PCPart;
use Livewire\Component;

class CreatePC extends Component
{
    public $PCform = [ 
        'pcname' => '', 
        'partcategory' => '', 
        'pcpart_id' => '', 
        'manufacturer_id' => '', 
    ];
    //public Form $form;
 
    public $partcategory;
    public $manufacturers = [];

    protected $rules = [ 
        'PCform.pcpart_name' => 'required|string|max:255', 
        'PCform.pcpart_price' => 'required|numeric', 
        'PCform.partcategory_id' => 'required|integer', 
        'PCform.manufacturer_id' => 'required|integer', ];

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
        if ($property === 'PCform.partcategory_id') {
            $this->manufacturers = Manufacturer::where('partcategory_id', $this->PCform['partcategory_id'])->get();
        }

        // if($property === 'form.section_id'){
        //     dd($this->form->section_id);
        // }
    }

    public function store()
    {
        $this->validate();
        
        PCPart::create(
            $this->PCform
        );
        
       flash()->success('Computer part added successfully');
        
        return redirect()->route('pcparts.indexpc');
    }

}
