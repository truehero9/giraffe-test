<?php

namespace App\Policies;

use App\User;
use App\Advert;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Advert $advert)
    {
        return $user->username === $advert->author->username;
    }

    public function delete(User $user, Advert $advert)
    {
        return $user->username === $advert->author->username;
    }
}
