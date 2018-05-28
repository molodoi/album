<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Grant all abilities to administrator.
     * Dans la fonction before on autorise les administrateurs
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->role === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the image.
     * Dans la fonction delete l’owner
     * @param \App\Models\User $user
     * @param \App\Models\Image $image
     * @return mixed
     */
    public function delete(User $user, Image $image)
    {
        return $user->id === $image->user_id;
    }

    public function manage(User $user, Image $image)
    {
        return $user->id === $image->user_id;
    }
}
