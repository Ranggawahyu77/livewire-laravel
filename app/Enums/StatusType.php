<?php

namespace App\Enums;

enum StatusType: string
{
  case STARTED = 'started';
  case IN_PROGRES = 'in_progress';
  case DONE = 'done';


  public function color(): string
  {
    return match ($this) {
      self::STARTED => 'border-blue-500',
      self::IN_PROGRES => 'border-yellow-500',
      self::DONE => 'border-green-500',
    };
  }
}
