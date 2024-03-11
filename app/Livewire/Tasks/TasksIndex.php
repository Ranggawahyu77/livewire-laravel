<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class TasksIndex extends Component
{
  public $title;
  public $slug;
  public $description;
  public $status;
  public $priority;
  public $deadline;

  public function save()
  {
    auth()->user()->tasks()->create($this->only(['title', 'slug', 'description', 'status', 'priority', 'deadline']));

    $this->reset();
  }

  public function render()
  {
    return view('livewire.tasks.tasks-index')->layout('layouts.app');
  }
}
