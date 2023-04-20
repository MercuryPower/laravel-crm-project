<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Leads extends Component
{

    protected $leads;
    public bool $confirmDelete;
    public string $status;
    public int $lead_id;

    protected $listeners = ['closeConfirmLeadDelete' => 'closeConfirmDelete'];


    public function mount()
    {
        $this->confirmDelete = false;
        $this->status = "default";
        $this->getLeadsWithStatus($this->status);
    }

    public function closeConfirmDelete(){
        $this->confirmDelete = false;
    }

    public function getLeads()
    {
        return $this->leads;
    }

    public function confirmDelete($id)
    {
        $this->lead_id = $id;
        $this->confirmDelete = true;
    }

    public function getLeadsWithStatus($key)
    {
        $this->status = $key;
        $this->leads = Lead::where('user_id', Auth::user()->id)->where('status', $key);
    }

    public function render()
    {
        $this->getLeadsWithStatus($this->status);

        return view('livewire.leads', ['leads'=>$this->leads->get()]);
    }
}
