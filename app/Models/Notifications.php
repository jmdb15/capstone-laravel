<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'content',
        'queries_id',
        'posts_id',
        'is_read',
    ];
    public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
    public function Votes()
    {
        return $this->belongsTo(Votes::class);
    }
    public function queries()
    {
        return $this->belongsTo(Queries::class);
    }
    public function comments()
    {
        return $this->belongsTo(Comments::class);
    }
}
