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
    protected $fillable = ['title', 'description', 'goal', 'saved', 'last', 'limit_day', 'daily_pay', 'user_id'];

    /**
     * Relationship between Goal and its User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Calculate the total of days from the created Goal until the date to complete it and save a daily payment amount
     * @return daily_pay
     */
    public function saveDailyPay()
    {
        //Get the amount of days between the limit day and the created goal
        $days = date_diff(date_create($this->limit_day), now())->days;

        $daily_pay = $this->goal / $days;

        return $daily_pay;
    }

}
