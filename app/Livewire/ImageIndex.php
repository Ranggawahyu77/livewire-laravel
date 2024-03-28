<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageIndex extends Component
{
  use WithFileUploads;

  #[Rule('max:1024')]
  public $photos;

  public function save()
  {
    $this->validate();
    if (!is_null($this->photos)) {
      foreach ($this->photos as $photo) {
        $name = $photo->getClientOriginalName();
        $path = $photo->storeAs('photo', $name, 'public');
      }
    }
    Image::create([
      'name' => $name,
      'path' => $path
    ]);

    $this->reset();
    unset($this->photos);
  }

  public function render()
  {
    return view('livewire.image-index')->layout('layouts.app');
  }
}
