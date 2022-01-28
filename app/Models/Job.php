<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_title',
        'description',
        'exp_in_month',
        'exp_in_year',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    /**
     * Get status 
     * 
     */
    public function getStatusAttribute($value) {
        return $value ? 'Active' : 'Inactive';
    }
    
    /**
     * Get created 
     * 
     */
    public function getCreatedAttribute() {
        return $this->created_at ? $this->created_at->format('jS M, Y') : '--';
    }
    
    /**
     * Get modified 
     * 
     */
    public function getModifiedAttribute() {
        return $this->updated_at ? $this->updated_at->format('jS M, Y') : '--';
    }

      /**
     * Get description
     *
     */
    public function getjobDescriptionAttribute($value)
    {

        return Str::limit($this->description, 50);
    }

    /*
     * Relation with  Skill
     */
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill');
    }

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }

}