<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'description',
    'status',
    'priority',
    'deadline'
  ];

  /**
   * Get the user that owns the Task
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
