<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
  #[Rule('required|min:5')]
  public $title;

  #[Rule('required|min:5')]
  public $slug;

  #[Rule('required|min:20')]
  public $description;

  #[Rule('required')]
  public $status;

  #[Rule('required')]
  public $priority;

  #[Rule('required')]
  public $deadline;

  function createTask()
  {
    auth()->user()->tasks()->create($this->all());
    request()->session()->flash('success', __('Task created successfully'));
  }
}
