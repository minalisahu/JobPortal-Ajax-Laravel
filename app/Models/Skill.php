<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','status'
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
}
