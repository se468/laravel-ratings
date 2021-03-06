# Laravel Ratings Engine
[![Latest Stable Version](https://poser.pugx.org/se468/laravel-ratings/v/stable)](https://packagist.org/packages/se468/laravel-ratings)
[![Total Downloads](https://poser.pugx.org/se468/laravel-ratings/downloads)](https://packagist.org/packages/se468/laravel-ratings)
[![License](https://poser.pugx.org/se468/laravel-ratings/license)](https://packagist.org/packages/se468/laravel-ratings)


Ratings engine for Laravel using polymorphic relationships.

**DEMO** : [here](http://package-demos.seyongcho.com/rating)


## Installation
1. `composer require se468/laravel-ratings`
1. `php artisan migrate` to migrate the tables
1. Add `CanReceiveRatings` trait to your model that receives Ratings (`App\User`, `App\Company`, `App\Project` .. whatever you need to receive ratings for) and implement `RatingReceivable` interface to the model.
1. Add `CanGiveRatings` trait to your model that needs to give Ratings (Usually `App\User`).

Example (CanGiveRatings):
```php
<?php
namespace App;
use se468\Ratings\RatingGivable;
...

class User extends Authenticatable
{
    use CanGiveRating;

    ...
}
```

Example (CanReceiveRatings): 
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use se468\Ratings\RatingReceivable;
use se468\Ratings\Traits\CanReceiveRating;
...

class Company extends Model implements RatingReceivable
{
    use CanReceiveRating;

    ...
}
```

## Usage

### Basic Usage Example
```php
public function rateCompany(Request $request)
{
    $input = $request->all();
    $company = Company::find($input["id"]);
    
    auth()->user()->rate($company, $input["rating"], 'Some Comment');

    return redirect()->back();
}
```


### CanReceiveRatings Trait
#### Getting all ratings:
```php
ratingsReceived() - morphMany to Ratings
```

#### Getting overall (average) rating:
```php
getOverallRating() 
```


### CanGiveRatings Trait
#### Getting ratings given by this:
```php
ratingsGiven() - hasMany to Ratings
```

#### Giving a rating:
```php
rate(RatingReceivable $ratable, $ratingValue)
```

### Rating
You can change `rater` function in `Rating` model if you want something other than `App\User` to give ratings.
