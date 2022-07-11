<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\EventForm;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Events extends Component
{
    use Modal;
    use WithFileUploads;

    public $name = '';
    public $description = '';
    public $fee = '';
    public $heldOnDate = '';
    public $picture = '';
    public $iEventId = 0;

    private $aEventRules = [
        'name'        => 'required',
        'description' => 'required',
        'fee'         => 'required',
        'heldOnDate'  => 'required',
        'picture'     => 'sometimes',
    ];

    public function render()
    {
        return view('livewire.events');
    }

    public function removepicture()
    {
        $this->picture = '';
    }

    public function showAddModal()
    {
        $this->isShownAddModal = true;
        $this->clear();
    }

    public function showEditModal(int $iId)
    {
        // TODO: Implement showEditModal() method.
    }

    public function saveEvent()
    {
        $this->validate($this->aEventRules);
        $mFilePath = $this->picture;
        if (is_object($mFilePath)) {
            $mFilePath = $this->picture->storeAs('public', 'events/featured/' . time() . '.' . $this->picture->getClientOriginalExtension());
            $mFilePath = '/' . str_replace('public', 'storage', $mFilePath);
        }
        $oEventModel = ($this->iEventId <= 0) ? new Event() : Event::find($this->iEventId);
        $oEventModel->name = $this->name;
        $oEventModel->description = $this->description;
        $oEventModel->held_on_date = $this->heldOnDate;
        $oEventModel->fee = $this->fee;
        $oEventModel->featured_image_url = $mFilePath;
        $oEventModel->is_done = false;
        $oEventModel->is_active = true;
        $oEventModel->added_by = Auth::id();
        $oEventModel->save();
        if($this->iEventId <= 0) {
            $oEventFormModel = new EventForm();
            $oEventFormModel->form_description = $oEventModel->description;
            $oEventFormModel->form_reply_template = 'Thank you for registering in ' . $oEventModel->name;
            $oEventFormModel->added_by = Auth::id();
            $oEventFormModel->event_id = $oEventModel->event_id;
            $oEventFormModel->save();
        }

        $this->clear();
        $this->emit('refreshLivewireDatatable');
        $this->isShownAddModal = false;

    }

    private function clear()
    {
        $this->name = '';
        $this->description = '';
        $this->fee = '';
        $this->heldOnDate = '';
        $this->picture = '';
        $this->resetErrorBag();
    }
}
