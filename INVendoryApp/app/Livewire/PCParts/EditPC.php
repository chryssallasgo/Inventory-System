<?php

namespace App\Livewire\PCParts;
use App\Livewire\Forms\PCForm;
use App\Models\Manufacturer;
use App\Models\PartCategory;
use App\Models\PCPart;

use Livewire\Component;

class EditPC extends Component
{
    public PCPart $pcpart;
    public PCForm $pcform;
    public $partcategory = [];
    public $manufacturers = [];

    public function mount(PCPart $pcpart)
    {
        $this->pcpart = $pcpart;
        $this->partcategory = PartCategory::all();
        $this->manufacturers = Manufacturer::all();
    }

    public function render()
    {
        return view('livewire.pcparts.editpc', [
            'partcategory' => PartCategory::all(),
            'manufacturers' => Manufacturer::all()
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
        $validated = $this->pcform->validate();
        
        // Map the validated data to the model
        $this->pcpart->pcpart_name = $this->pcform->pcpart_name;
        $this->pcpart->pcpart_price = $this->pcform->pcpart_price;
        $this->pcpart->partcategory_id = $this->pcform->partcategory_id;
        $this->pcpart->manufacturer_id = $this->pcform->manufacturer_id;
    
        // Update the record in the database
        $this->pcpart->save();
    
        // Provide success message
        flash()->success('Computer Part updated successfully');
    
        // Redirect to the index page
        return $this->redirect(IndexPC::class, navigate: true);
    }
    
}