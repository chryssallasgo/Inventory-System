<?php

namespace App\Livewire\PCParts;

use App\Livewire\Forms\PCForm;
use App\Models\PartCategory;
use App\Models\Manufacturer;
use App\Models\PCPart;
use Livewire\Component;

class CreatePC extends Component
{
    //public StudentForm $form;

    public $sections = [];

    public function render()
    {
        return view('livewire.pcpart.createpc',[
        'partcategory' => PartCategory::all()
        ]);
    }

    public function updated($property)
    {
        if ($property === 'form.pcpart_id') {
            $this->sections = Manufacturer::where('manufacturer_id', $this->form->pcpart_id)->get();
        }

        // if($property === 'form.section_id'){
        //     dd($this->form->section_id);
        // }
    }

    public function store()
    {
        $this->validate();
        
        PCPart::create(
            $this->form->all()
        );
        
       //flash()->success('Student added successfully');
        
        return $this->redirect(PCPart::class, navigate: true);
    }

}
