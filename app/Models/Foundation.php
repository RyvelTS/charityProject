<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foundation extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'email',
    'phone',
    'country',
    'bank_account_number'
  ];
  public function members()
  {
    return $this->hasMany(Member::class);
  }
}
