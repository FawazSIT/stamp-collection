<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner', 
        'secret', 
        'number'
    ];

    /**
     * Define the relationship with users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'stamp_user');
    }
}
