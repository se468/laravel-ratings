<?php
namespace se468\Reputation\Traits;

use se468\Reputation\Rating;

trait CanReceiveRating
{
    public function ratingsReceived()
    {
        return $this->morphMany('se468\Reputation\Rating', 'ratables');
    }

    public function getOverallRating()
    {
        if (count($this->ratingsReceived) == 0) {
            return 0;
        }

        $total = 0;

        foreach ($this->ratingsReceived as $rating) {
            $total += $rating->rating;
        }
        
        return $total / count($this->ratingsReceived);
    }

    public function getRatingsFrom($rater)
    {
    }

    public function getAllRatings()
    {
        return $this->ratingsReceived;
    }
}
