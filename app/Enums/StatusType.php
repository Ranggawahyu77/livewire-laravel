<?php

namespace App\Enums;

enum StatusType: string
{
  case STARTED = 'started';
  case IN_PROGRES = 'in_progeres';
  case DONE = 'done';
}
