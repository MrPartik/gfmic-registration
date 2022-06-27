<div class ="mt-5 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch p-2 rounded-lg">
    <div class="loading-page" wire:loading.block wire:target="picture, saveEvent">Loading&#8230;</div>
    <button wire:click="showAddModal" class="mb-5 flex items-center space-x-2 px-3 border border-blue-400 rounded-md bg-white text-blue-400 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-blue-100 focus:outline-none">
        <span>Add Event</span>
        <svg class="h-5 w-5 stroke-current m-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
    </button>
    <div class="mt-5">
        <livewire:events-datatable id="user-table" searchable="name, email" exportable />
    </div>
    <x-jet-dialog-modal id="add_event_modal" wire:model="isShownAddModal" >
        <x-slot name="title">
            {{ __('Add Event') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Adding event information') }}
            <div class="mt-4" x-data="{}">
                <div class="col-span-6 sm:col-span-4">
                    <label class="block font-medium text-sm text-gray-700" for="name">
                        Name
                    </label>
                    <x-jet-input wire:model.lazy="name" type="text" class="mt-1 block w-full" placeholder="{{ __('Name') }}"/>
                    <x-jet-input-error for="name" class=""/>
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <label class="block font-medium text-sm text-gray-700" for="name">
                        Description
                    </label>
                    <x-jet-input wire:model.lazy="description" type="text" class="mt-1 block w-full" placeholder="{{ __('Description') }}"/>
                    <x-jet-input-error for="description" class=""/>
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <label class="block font-medium text-sm text-gray-700" for="fee">
                        Fee
                    </label>
                    <x-jet-input wire:model.lazy="fee" type="text" class="mt-1 block w-full" placeholder="{{ __('Fee') }}"/>
                    <x-jet-input-error for="fee" class=""/>
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <label class="block font-medium text-sm text-gray-700" for="heldOnDate">
                        Held On (MM/DD/YYYY) (if multiple, please separate with comma (,))
                    </label>
                    <x-jet-input wire:model.lazy="heldOnDate" type="text" class="mt-1 block w-full" placeholder="{{ __('Held On') }}"/>
                    <x-jet-input-error for="heldOnDate" class=""/>
                </div>
                <div class="mt-3">
                    <div class="de_form">
                        <label class="de_form" for="input_7_9">Please Provide Pictures Of Your Award</label>
                        <div>
                            <input id="uploadPicturesOfLandscapes" style="display: none" wire:model="picture" type="file" accept="image/*">
                            <button onclick="$('#uploadPicturesOfLandscapes').click()" class="mb-5 flex items-center space-x-2 px-3 border border-blue-400 rounded-md bg-white text-blue-400 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-blue-100 focus:outline-none">
                                <span>Upload Image</span>
                                <svg class="h-5 w-5 stroke-current m-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <span>Max. file size: 5 MB.</span>
                            @if($picture !== null && $picture !== '')
                                <div class=" row" style="text-align:center; display:flow-root;">
                                    <div class="image-preview-container row">
                                        <div style="background: url('{{ (is_object($picture)) ? url($picture->temporaryUrl()) : url($picture) }}') no-repeat center"
                                             class="image col-3 m-1"></div>
                                        <div class="overlay col-3">
                                            <a href="javascript:" wire:click="removepicture()" class="icon" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isShownAddModal')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="saveEvent" class="ml-2"  wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div >
