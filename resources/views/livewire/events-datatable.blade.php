<div style="display:inline-block; ">
    @if(@$type === 'featured_image')
        @if ($url !== '')
            <a target="_blank" href="{{ url($url) }}">
                <img style="display:inline-block; max-height: 50px" src="{{ url($url) }}" alt=""/>
            </a>
        @endif
    @elseif(@$type === 'action')
        @if($featuredImage === '' || intval($currId) !== intval($id))
            <input wire:change="updateCurrId({{ $id }})" id="uploadPictures_{{ $id }}" style="display: none" wire:model="featuredImage" type="file" accept="image/*">
            <button onclick="$('#uploadPictures_{{ $id }}').click()" class="mb-5 flex items-center space-x-2 px-3 border border-blue-400 rounded-md bg-white text-blue-400 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-blue-100 focus:outline-none">
                <span>Change</span>
                <svg class="h-5 w-5 stroke-current m-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="currentColor">
                    <path d="M0 5L0 45L50 45L50 5 Z M 2 7L48 7L48 33L37.320313 33L30.320313 28L24.414063 28L20.328125 23.914063L15.460938 24.890625L11.15625 18.429688L2 27.585938 Z M 37.5 13C35.027344 13 33 15.027344 33 17.5C33 19.972656 35.027344 22 37.5 22C39.972656 22 42 19.972656 42 17.5C42 15.027344 39.972656 13 37.5 13 Z M 37.5 15C38.890625 15 40 16.109375 40 17.5C40 18.890625 38.890625 20 37.5 20C36.109375 20 35 18.890625 35 17.5C35 16.109375 36.109375 15 37.5 15 Z M 10.84375 21.570313L14.539063 27.109375L19.671875 26.085938L23.585938 30L29.679688 30L36.679688 35L48 35L48 43L2 43L2 30.414063Z" fill="#5B5B5B" />
                </svg>
            </button>
        @elseif(intval($currId) === intval($id))
            <button id="saveUploade_{{ $id }}" wire:click="updateImage({{ $id }})" class="mb-5 flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-400 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-100 focus:outline-none" >
                <span>Save</span>
                <svg class="h-5 w-5 stroke-current m-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="currentColor">
                    <path d="M0 5L0 45L50 45L50 5 Z M 2 7L48 7L48 33L37.320313 33L30.320313 28L24.414063 28L20.328125 23.914063L15.460938 24.890625L11.15625 18.429688L2 27.585938 Z M 37.5 13C35.027344 13 33 15.027344 33 17.5C33 19.972656 35.027344 22 37.5 22C39.972656 22 42 19.972656 42 17.5C42 15.027344 39.972656 13 37.5 13 Z M 37.5 15C38.890625 15 40 16.109375 40 17.5C40 18.890625 38.890625 20 37.5 20C36.109375 20 35 18.890625 35 17.5C35 16.109375 36.109375 15 37.5 15 Z M 10.84375 21.570313L14.539063 27.109375L19.671875 26.085938L23.585938 30L29.679688 30L36.679688 35L48 35L48 43L2 43L2 30.414063Z" fill="#5B5B5B" />
                </svg>
            </button>
        @endif
            <button wire:click="showEditModal({{$id}})" id="formConfigure_{{ $id }}" class="mb-5 flex items-center space-x-2 px-3 border border-blue-400 rounded-md bg-white text-blue-400 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-blue-100 focus:outline-none" >
                <span>Form</span>
                <svg class="h-5 w-5 stroke-current m-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="currentColor">
                    <path d="M5 4 A 1.0001 1.0001 0 0 0 4 5L4 45 A 1.0001 1.0001 0 0 0 5 46L45 46 A 1.0001 1.0001 0 0 0 46 45L46 5 A 1.0001 1.0001 0 0 0 45 4L5 4 z M 6 6L44 6L44 44L6 44L6 6 z M 20 11L20 12L20 19L40 19L40 11L20 11 z M 22 13L38 13L38 17L22 17L22 13 z M 10 14L10 16L18 16L18 14L10 14 z M 20 23L20 24L20 31L40 31L40 23L20 23 z M 22 25L38 25L38 29L22 29L22 25 z M 10 26L10 28L18 28L18 26L10 26 z M 20 35L20 36L20 41L26 41L26 35L20 35 z M 22 37L24 37L24 39L22 39L22 37 z M 28 37L28 39L40 39L40 37L28 37 z" fill="#5B5B5B" />
                </svg>
            </button>

            @if($currIncr === 1)
                <x-jet-dialog-modal id="configure_form_modal" wire:model="isShownEditModal" >
                    <x-slot name="title">
                        {{ __('Configure Registration Form') }}
                    </x-slot>
                    <x-slot name="content">
                        {{ __('Modify form information that are being displayed in page ') }}
                        <div wire:ignore class="mt-4" x-data="{}">
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="formDesc">
                                    Registration Form Description
                                </label>
                                <x-jet-input wire:model.lazy="formDesc" type="text" class="mt-1 block w-full" placeholder="{{ __('Some Description Regarding the Event') }}"/>
                                <x-jet-input-error for="formDesc" class=""/>
                            </div>
                            <div class="col-span-6 sm:col-span-4 mt-3">
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Registration Form Reply Template
                                </label>
                                <x-jet-input wire:model.lazy="replyTemplate" type="text" class="mt-1 block w-full" placeholder="{{ __('Thank you for registering to our Event') }}"/>
                                <x-jet-input-error for="replyTemplate" class=""/>
                            </div>
                            <div style="margin-top: 10px" class="form-check">
                                <input wire:model.lazy="allowPrc" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="allowPrc">
                                <label class="form-check-label inline-block text-gray-800" for="allowPrc">
                                    Allow PRC Info
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="form-check">
                                <input wire:model.lazy="requirePrc" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="requirePrc">
                                <label class="form-check-label inline-block text-gray-800" for="requirePrc">
                                    Require PRC Info
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="form-check">
                                <input wire:model.lazy="allowToFollow" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="allowToFollow">
                                <label class="form-check-label inline-block text-gray-800" for="allowToFollow">
                                    Allow to follow payment
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="form-check">
                                <input wire:model.lazy="allowMultipleRegistrants" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="allowMultipleRegistrants">
                                <label class="form-check-label inline-block text-gray-800" for="allowMultipleRegistrants">
                                    Allow Multiple Registrants
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="form-check">
                                <input wire:model.lazy="requirePersonalInfo" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="requirePersonalInfo">
                                <label class="form-check-label inline-block text-gray-800" for="requirePersonalInfo">
                                    Require Personal Information
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="form-check">
                                <input wire:model.lazy="allowOnlinePayment" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="allowOnlinePayment">
                                <label class="form-check-label inline-block text-gray-800" for="allowOnlinePayment">
                                    Allow Online Payment
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-4 mt-3">
                                <label class="block font-medium text-sm text-gray-700" for="fee">
                                    Other Form Fields
                                </label>
                                <x-jet-input wire:model.lazy="otherFormFields" type="text" class="mt-1 block w-full" placeholder="{{ __('Other Form Fields') }}"/>
                                <x-jet-input-error for="fee" class=""/>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('isShownEditModal')" wire:loading.attr="disabled">
                            {{ __('Nevermind') }}
                        </x-jet-secondary-button>

                        <x-jet-button wire:click="saveEventForm" class="ml-2"  wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-dialog-modal>
            @endif
            @php $currIncr++; @endphp
    @endif
</div>
