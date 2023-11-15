<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'sender',
        'content',
        'queries_id',
        'comments_id',
        'checked',
    ];
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function sender()
    {
        return $this->belongsTo(Users::class, 'sender');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function queries()
    {
        return $this->hasMany(Queries::class);
    }
}
