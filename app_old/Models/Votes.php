<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;
    protected $fillable = ['users_id', 'queries_id', 'comments_id', 'checked'];
    
    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public function comments()
    {
        return $this->belongsTo(Comments::class);
    }
}
