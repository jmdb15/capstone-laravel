<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'links',
        'caption',
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    protected $attributes = [
        // Set the default value for the 'created_at' column
        'created_at' => null, // Replace 'null' with the desired default value
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set the 'created_at' attribute to the current date and time during the 'creating' event
            $model->created_at = Carbon::now();
        });
    }
}
