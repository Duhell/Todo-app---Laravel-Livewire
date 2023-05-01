<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
class Modal extends Component
{
    public $task;

    public function addTask(){
        $db = new Task;
        $db->task = $this->task;
        $db->save();
        $this->emit('refreshData');
        $this->task = "";
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
