<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function update(User $user, Post $post): bool {
        if($user->is_admin == 1) {
            return $user->is_admin == 1;
        } else {
            return $user->id === $post->user_id;    
        }
    }

       
    public function delete(User $user, Post $post)
    {
        if($user->is_admin == 1) {
            return $user->is_admin == 1;
        } else {
            return $user->id === $post->user_id;    
        }
    }
}
