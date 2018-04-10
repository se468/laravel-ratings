<?php
namespace se468\Reputation\Traits;

use se468\Reputation\Rating;
use se468\Reputation\RatingReceivable;

trait CanGiveRating
{
    public function ratingsGiven()
    {
        return $this->hasMany('se468\Reputation\Rating', 'rater_id');
    }

    public function rate(RatingReceivable $ratable, $ratingValue)
    {
        $rating = Rating::create([
            'rating' => $ratingValue,
            'rater_id' => $this->id
        ]);
        $ratable->ratingsReceived()->save($rating);
        return $ratable;
    }
}
