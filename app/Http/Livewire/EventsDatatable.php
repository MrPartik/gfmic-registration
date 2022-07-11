<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventForm;
use Livewire\WithFileUploads;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EventsDatatable extends LivewireDatatable
{
    use WithFileUploads, Modal;

    public $model = Event::class;
    public $beforeTableSlot = 'livewire.events-datatable';
    public $featuredImage = '';
    public $iId = 0;
    public $formDesc = '';
    public $replyTemplate = '';
    public $allowPrc = true;
    public $requirePrc = true;
    public $allowToFollow = true;
    public $allowMultipleRegistrants = true;
    public $requirePersonalInfo = true;
    public $allowOnlinePayment = false;
    public $otherFormFields = '';
    public $formId = 0;

    public function columns()
    {
        $iCurrIncr = 1;
        return [
            NumberColumn::name('event_id')->hide(),
            Column::callback('featured_image_url', function ($sUrl) {
                return view('livewire.events-datatable', [
                    'url'  => $sUrl,
                    'type' => 'featured_image',
                ]);
            })->label('Featured Image'),
            Column::name('name')->editable()->label('Name'),
            Column::name('description')->editable()->label('Description'),
            Column::name('held_on_date')->editable()->label('Held on'),
            Column::name('fee')->editable()->label('Fee'),
            Column::callback('is_done', function ($bIsDone) {
                return ($bIsDone) ? 'Yes' : 'Not yet';
            })->label('Done?'),
            Column::callback('event_id', function ($iId) use ($iCurrIncr) {
                return view('livewire.events-datatable', [
                    'currIncr'      => $iCurrIncr,
                    'id'            => $iId,
                    'currId'        => $this->iId,
                    'type'          => 'action',
                    'featuredImage' => $this->featuredImage,
                ]);
            })->label('Actions'),
        ];
    }

    public function updateCurrId(int $iId)
    {
        $this->iId = $iId;
    }

    public function updateImage(int $iId)
    {
        $mFilePath = $this->featuredImage;
        if (is_object($mFilePath)) {
            $mFilePath = $this->featuredImage->storeAs('public', 'events/featured/' . time() . '.' . $this->featuredImage->getClientOriginalExtension());
            $mFilePath = '/' . str_replace('public', 'storage', $mFilePath);
        }
        $oEventModel = Event::find($iId);
        $oEventModel->featured_image_url = $mFilePath;
        $oEventModel->save();
        $this->emit('refreshLivewireDatatable');
        $this->featuredImage = '';
        $this->iId = 0;
    }

    public function showAddModal()
    {
        $this->isShownAddModal = true;
    }

    public function showEditModal($iId)
    {
        $this->isShownEditModal = true;
        $oEventFormModel = EventForm::where('event_id', $iId)->first();

        if ($oEventFormModel !== null) {
            $this->formDesc = $oEventFormModel->form_description;
            $this->replyTemplate = $oEventFormModel->form_reply_template;
            $this->allowPrc = $oEventFormModel->allow_prc_info;
            $this->requirePrc = $oEventFormModel->require_prc_info;
            $this->allowToFollow = $oEventFormModel->allow_to_follow_payment;
            $this->allowMultipleRegistrants = $oEventFormModel->allow_multiple_registrants;
            $this->requirePersonalInfo = $oEventFormModel->require_personal_info;
            $this->allowOnlinePayment = $oEventFormModel->allow_online_payment;
            $this->otherFormFields = $oEventFormModel->other_form_fields;
            $this->formId = $oEventFormModel->event_form_id;
        }
    }

    public function saveEventForm()
    {
        $oEventFormModel = ($this->formId > 0) ? EventForm::find($this->formId) : new EventForm();
        $oEventFormModel->form_description = $this->formDesc;
        $oEventFormModel->form_reply_template = $this->replyTemplate;
        $oEventFormModel->allow_prc_info = $this->allowPrc;
        $oEventFormModel->require_prc_info = $this->requirePrc;
        $oEventFormModel->allow_to_follow_payment = $this->allowToFollow;
        $oEventFormModel->allow_multiple_registrants = $this->allowMultipleRegistrants;
        $oEventFormModel->require_personal_info = $this->requirePersonalInfo;
        $oEventFormModel->allow_online_payment = $this->allowOnlinePayment;
        $oEventFormModel->allow_online_payment = $this->allowOnlinePayment;
        $oEventFormModel->other_form_fields = $this->otherFormFields;
        $oEventFormModel->save();
        $this->formId = 0;
        $this->isShownEditModal = false;
    }
}
