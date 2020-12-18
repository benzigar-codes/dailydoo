<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
	public $displayDate;
	public $task;
	public $dateDetermined;
	public $changeDate;
	public $name,$type;
	public $morningLearn,$morningWork,$afternoonLearn,$afternoonWork;
	public function mount()
	{
		$this->changeDate = NULL;
		$this->displayDate=\Carbon\Carbon::today()->toFormattedDateString();
		$this->type="learn";
	}
	public function refresh()
	{
		$this->morningLearn=\App\Doo::morning(auth()->user()->id,$this->dateDetermined)->where("type","learn")->get();
		$this->morningWork=\App\Doo::morning(auth()->user()->id,$this->dateDetermined)->where("type","work")->get();
		$this->afternoonLearn=\App\Doo::afternoon(auth()->user()->id,$this->dateDetermined)->where("type","learn")->get();
		$this->afternoonWork=\App\Doo::afternoon(auth()->user()->id,$this->dateDetermined)->where("type","work")->get();
	}
	public function addTodo()
	{
		$this->validate([
			"task" => "required"
		]);
		\App\Todo::create([
			"user_id" => auth()->user()->id, 
			"task" => $this->task,
			"completed" => "0"
		]);
		$this->task="";
	}
	public function deleteDoo($id)
	{
		$doo = \App\Doo::find($id);
		$doo->delete();
	}
	public function deleteTodo($id)
	{
		$doo = \App\Todo::find($id);
		$doo->delete();
	}
	public function todoCompleted($id)
	{
		$doo = \App\Todo::find($id);
		$task = $doo->task;
		$doo->completed = "1";
		$doo->save();
		\App\Doo::create([
			"user_id" => auth()->user()->id,
			"name" => $task,
			"type" => "Learn",
			"date" => \Carbon\Carbon::today(),
			"time" => \Carbon\Carbon::now()
		]);
		$this->name="";
		$this->displayDetermined=\Carbon\Carbon::today();
	}
	public function addDoo()
	{
		$this->validate([
			"name" => "required|min:2",
			"type" => "required"
		]);
		\App\Doo::create([
			"user_id" => auth()->user()->id,
			"name" => $this->name,
			"type" => $this->type,
			"date" => \Carbon\Carbon::today(),
			"time" => \Carbon\Carbon::now()
		]);
		$this->name="";
		$this->displayDetermined=\Carbon\Carbon::today();
	}
    public function render()
    {
    	$this->dateDetermined=($this->changeDate == NULL) ? \Carbon\Carbon::today()->toDateString() : $this->changeDate;
    	$this->refresh();
        return view('livewire.home');
    }
}
