<?php

namespace App\Models;


use App\Constants\GeneralStatus;

class User extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'date',
        'email',
        'email_verified_at',
        'phone',
        'phone_verified_at',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    protected $with = [
        'roles'
    ];

    public function getActiveRole()
    {
        return $this->roles()->where('status', GeneralStatus::STATUS_ACTIVE)->first();
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisements::class);
    }
}
