<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
class Modal extends Component
{
    public $task;
    public $expectedDate;

    public function addTask(){
        $db = new Task;
        $db->task = $this->task;
        $db->finished = $this->expectedDate;
        $db->save();
        $this->emit('refreshData');
        $this->task = "";
        $this->expectedDate = "";
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
