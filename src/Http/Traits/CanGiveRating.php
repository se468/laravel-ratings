<?php
namespace se468\Ratings\Traits;

use se468\Ratings\Rating;
use se468\Ratings\RatingReceivable;

trait CanGiveRating
{
    public function ratingsGiven()
    {
        return $this->hasMany('se468\Ratings\Rating', 'rater_id');
    }

    public function rate(RatingReceivable $ratable, $ratingValue, $comment = null)
    {
        $rating = Rating::create([
            'rating' => $ratingValue,
            'rater_id' => $this->id,
            'comment' => $comment
        ]);

        $ratable->ratingsReceived()->save($rating);
        return $rating;
    }
}
