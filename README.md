# Laravel Ratings Engine
Ratings engine for Laravel using polymorphic relationships.

## Installation
0. `composer install se468/laravel-ratings`
0. `php artisan migrate` to migrate the tables
0. Add `CanReceiveRatings` trait to your model that receives Ratings (`App\User`, `App\Company`, `App\Project` .. whatever you need to receive ratings for) and implement `RatingReceivable` interface to the model.
0. Add `CanGiveRatings` trait to your model that needs to give Ratings (Usually `App\User`).

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
    
    auth()->user()->rate($company, $input["rating"]);

    return redirect()->back();
}
```


### CanReceiveRatings Trait
#### Getting all ratings:
```
getAllRatings()

returns array of all ratings received
```

#### Getting overall (average) rating:
```
getOverallRating() 

returns overall rating, average of all ratings
```


### CanGiveRatings Trait
#### Giving a rating:
```
rate(RatingReceivable $ratable, $ratingValue)
```

Example:
```
$rating = new Rating(5);
$user->rate($company, $rating)
```

### Rating
You can change `rater` function in `Rating` model if you want something other than `App\User` to give ratings.
