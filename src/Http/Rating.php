<?php
namespace se468\Ratings;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'rating', 'rater_id', 'comment'
    ];

    public function ratable()
    {
        return $this->morphTo();
    }

    // You can change this model to whatever model that implements RatingGivable
    public function rater()
    {
        return $this->belongsTo('App\User', 'rater_id');
    }
}
