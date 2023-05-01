<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Todo extends Component
{
    public $tasks;
    public $total;

    protected $listeners = ['refreshData'=>'mount'];
    public function mount(){
        $this->allTask();
    }

    public function allTask(){
        $this->tasks = Task::latest('updated_at')->get();
        $this->total = Task::all()->count();
    }

    public function deleteTask($id){

        $task = Task::find($id);
        $task->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
