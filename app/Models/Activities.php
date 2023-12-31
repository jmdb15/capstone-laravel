<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $fillable = ['users_id', 'activity', 'created_at'];

    public function users()
    {
        return $this->belongsTo(Users::class, 'users_id');
    }
}
