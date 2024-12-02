<?php

namespace App\Livewire\Forms;

use App\Models\PCPart;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PCForm extends Form
{
    public ?PCPart $pcpart;

    #[Validate]
    public $pcpart_name;
    public $pcpart_price;
    public $partcategory_id;
    public $manufacturer_id;

    public function rules()
    {
        return [
            'pcpart_name' => 'required|string|max:255',
            'pcpart_price' => 'required|numeric|min:0',
            'partcategory_id' => 'required|exists:partcategory,id',
            'manufacturer_id' => 'required|exists:manufacturer,id',
        ];
    }

    public function messages()
    {
        return [
            'partcategory_id.required' => 'The part category field is required',
            'manufacturer_id.required' => 'A manufacturer field is required',
        ];
    }

    public function setPCPart(PCPart $pcpart)
    {
        $this->pcpart = $pcpart;
        $this->pcpart_name = $pcpart->pcpart_name;
        $this->pcpart_price = $pcpart->partprice;
        $this->partcategory_id = $pcpart->partcategory_id;
        $this->manufacturer_id = $pcpart->manufacturer_id;
    }

    public function all()
    {
        return [
            'pcpart_name' => $this->pcpart_name,
            'pcpart_price' => $this->pcpart_price,
            'partcategory_id' => $this->partcategory_id,
            'manufacturer_id' => $this->manufacturer_id,
        ];
    }
}
