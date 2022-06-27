<?php
namespace App\Http\Livewire;

trait Modal {

    public $isShownAddModal = false;
    public $isShownEditModal = false;

    abstract public function showAddModal();

    abstract public function showEditModal();
}
