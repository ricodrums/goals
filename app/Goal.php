<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'goal', 'saved', 'last', 'limit_day', 'user_id'];
    
    /**
     * Relationship between Goal and its User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
