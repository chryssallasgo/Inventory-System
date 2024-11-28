<?php

namespace App\Livewire\PCParts;

use App\Livewire\Forms\PCForm;
use App\Models\PartCategory;
use App\Models\PCPart;
use App\Models\Manufacturer;
use Livewire\Component;

class EditPC extends Component
{
    public PCPart $pcpart;

    public PCForm $pcform;

    public $manufacturer = [];

    public function mount()
    {
        $this->pcform->setPCPart($this->pcpart);
        $this->manufacturer = Manufacturer::where('pcpart_id', $this->pcpart->pcpart_id)->get();
    }

    public function render()
    {
        return view('livewire.pcparts.editpc', [
            'partcategory' => PartCategory::all()
        ]);
    }

    public function updated($property)
    {
        if ($property === 'form.pcpart_id') {
            $this->manufacturer = Manufacturer::where('pcpart_id', $this->pcform->pcpart_id)->get();
        }

        // if($property === 'form.section_id'){
        //     dd($this->form->section_id);
        // }
    }

    public function update()
    {
        $this->validate();
        
        $this->pcpart->update(
            $this->pcform->all()
        );

        //flash()->success('Student updated successfully');
        
        return $this->redirect(PCPart::class, navigate: true);
    }
}