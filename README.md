# Laravel Reputation Engine
Reputation/Ratings engine for your User class.

## Installation
0. `composer install se468/laravel-reputation`
0. `php artisan migrate` to migrate the tables
0. Add `CanReceiveReputation` trait to your model that receives reputation (User, Company, Project...) and implement `Ratable` interface to the model.
0. Add `CanGiveReputation` trait to your model that needs to give reputation (Usually User model).

## Usage

### Basic
```
$user->rate($company, 5);
$companyOverallRating = $company->getOverallRating();
```


### CanReceiveReputation

Methods:
```
getAllRatings()

returns array of all ratings received
```

```
getRatingsFrom($giver)

returns array of all ratings received by a rating giver
```

```
getOverallRating() 

returns overall rating, average of all ratings
```


### CanGiveReputation
Methods:
```
giveRating - give a rating
```
Example:

```
$rating = new Rating();
$user->giveRating($company, $rating)
```

### Rating
Properties
```
from_id
to_id
ratable_type
minRating - Default 0
maxRating - Default 5
```


