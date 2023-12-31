<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Attribute; //i have remove this because there is a problem occurs when doing accessor mutator
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// i added the next two lines so that accessor mutator will work
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
// this is for str
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // these are the fields which can be field
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'avatar',   
    //     'password',
    // ];

    //for alternative, we can use guarded to lessen the work
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //this is for hashing password
    protected function name():Attribute
    {
        return Attribute::make(
            get: fn($value)=>Str::upper($value)
        );
    }

    //this is for upper case name
    protected function password():Attribute
    {
        return Attribute::make(
            set: fn($value)=>bcrypt($value)
        );
    }
}
