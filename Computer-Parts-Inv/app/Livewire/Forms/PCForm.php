<?php

namespace App\Livewire\Forms;

use App\Models\PCPart;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PCForm extends Form
{

    public ?PCPart $pcpart;

    #[Validate]
    public $pcname;

    #[Validate]
    public $pcprice;

    #[Validate]
    public $pcpart_id;

    #[Validate]
    public $manufacturer_id;

    public function rules()
    {
        $rules = [
            'pcname' => 'required',
            'pcprice' => 'required|email|unique:pcparts,pcprice',
            'pcpart_id' => 'required',
            'manufacturer_id' => 'required'
        ];
        if(isset($this->pcpart)){
            $rules['pcprice'] = 'required|pcprice|unique:pcparts,pcprice,'. $this->pcpart->id;
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'pcpart_id.required' => 'The pcpart field is required',
            'manufacturer_id.required' => 'A manufacturer field is required',
        ];
    }

    public function setPCPart(PCPart $pcpart)
    {
        $this->pcpart = $pcpart;
        $this->pcname = $pcpart->name;
        $this->pcprice = $pcpart->pcprice;
        $this->pcpart_id = $pcpart->pcpart_id;
        $this->manufacturer_id = $pcpart->manufacturer_id;
    }
}
