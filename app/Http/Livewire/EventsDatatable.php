<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EventsDatatable extends LivewireDatatable
{
    public $model = Event::class;
    public $beforeTableSlot = 'livewire.events-datatable';

    public function columns()
    {
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
            Column::delete('event_id')->label('delete'),
        ];
    }
}
