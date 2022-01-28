<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alias','status'
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

    /**
     * Relation with user
     */
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

}
