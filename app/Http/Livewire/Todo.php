<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Todo extends Component
{
    public $tasks;
    public $dues;
    public $daysLeft;
    public $total;
    public $alltaskBTN = true;
    public $duetaskBTN = false;

    protected $listeners = ['refreshData'=>'allTask'];
    public function mount(){
        $this->allTask();
        $this->dueTask();
        $this->alltaskBTN = true;
    }

    public function allTask(){
        $this->tasks = Task::latest('updated_at')->get();
        $this->total = Task::all()->count();

    }
    public function dueTask(){
        $this->dues = Task::where('finished','<=', now()->addDays(2))->latest('created_at')->get();
    }

    public function deleteTask($id){

        $task = Task::find($id);
        $task->delete();
        $this->mount();
    }

    public function all(){
        $this->alltaskBTN = true;
        $this->duetaskBTN = false;
        $this->mount();

    }
    public function due(){
        $this->duetaskBTN = true;
        $this->alltaskBTN = false;
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
