<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['post'];

    /**
     * Get the foundation that the member belongs to.
     */
    public function foundation()
    {
        return $this->belongsTo(Foundation::class);
    }
    
    protected $fillable = [
      'user_id',
      'foundation_id',
      'role_id'
  ];
}
