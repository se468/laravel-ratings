<?php
namespace se468\Reputation\Traits;

use se468\Reputation\Rating;

trait CanReceiveReputation
{
    public function ratings()
    {
        return $this->morphToMany('se468\Reputation\Rating', 'ratables');
    }

    public function overallRating()
    {
        if (count($this->ratings) == 0) {
            return 0;
        }

        $totalRating = 0;

        foreach ($this->ratings as $rating) {
            $totalRating += $rating->rating;
        }

        return $totalRating / count($this->ratings);
    }
}
