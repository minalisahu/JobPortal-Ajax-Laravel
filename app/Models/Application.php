<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'user_id',
        'headline',
        'cover_letter',
        'is_applied',
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
    * Relation with  job
    */
   public function job()
   {
       return $this->belongsTo('App\Models\Job');
   }

}
