<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $guarded;

    public function queries()
    {
        return $this->belongsTo(Queries::class);
    }   
    public function users()
    {
        return $this->belongsTo(Users::class);
    }   
    public function votes()
    {
        return $this->hasMany(Votes::class);
    }
}
