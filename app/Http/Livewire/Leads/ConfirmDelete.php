<?php

namespace App\Http\Livewire\Leads;

use App\Models\Lead;
use Livewire\Component;

class ConfirmDelete extends Component
{

    public $lead;

    public function mount(int $lead_id)
    {
        $this->lead = Lead::find($lead_id);
    }

    public function deleteLead(){
        $this->lead->delete();
        $this->emit('closeConfirmLeadDelete');
    }

    public function render()
    {
        return view('livewire.leads.confirm-delete');
    }
}
