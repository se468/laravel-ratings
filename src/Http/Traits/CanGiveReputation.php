<?php
namespace se468\Reputation\Traits;

use se468\Reputation\Ratable;

trait CanGiveReputation
{
    public function rate(Ratable $ratable, $rating)
    {
        $ratable->ratings()->attach($rating);

        return $ratable;
    }
}
