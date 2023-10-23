<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Users extends Model implements MustVerifyEmail, AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    protected $table = 'users';
    protected $fillable = ['password', 'id', 'name', 'email', 'type', 'trusted', 'is_disabled']; //specific dcolumns for changes
    // protected $guarded = [];//for all columns changeable
    use Authenticatable, Authorizable, CanResetPassword;

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at !== null;
    }

    public function markEmailAsVerified()
    {
        $this->email_verified_at = now();
        $this->save();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function queries()
    {
        return $this->hasMany(Queries::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function votes()
    {
        return $this->hasMany(Votes::class);
    }
    public function activities()
    {
        return $this->hasMany(Activities::class);
    }

}
