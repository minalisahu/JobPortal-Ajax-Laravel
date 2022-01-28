<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable,
        SoftDeletes,
        HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'companyname',
        'access',
        'status',
        'role_id',
        'exp_in_month',
        'exp_in_year',
        'title',
        'resume',
        'path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    /**
     * Scope a query to only include active model.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include admin model.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmin($query)
    {
        return $query->where('access', 1);
    }

    /**
     * Scope a query to only include seeker model.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSeeker($query)
    {
        return $query->where('access', 2);
    }
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
     * Get status
     *
     */
    public function getStatusAttribute($value)
    {
        return $value ? 'Active' : 'Inactive';
    }

    /**
     * Get created
     *
     */
    public function getCreatedAttribute()
    {
        return $this->created_at ? $this->created_at->format('jS M, Y') : '--';
    }

    /**
     * Get modified
     *
     */
    public function getModifiedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('jS M, Y') : '--';
    }

    /*
     * Relation with  Skill
     */
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill');
    }
}
