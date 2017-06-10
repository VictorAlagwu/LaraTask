<?php

namespace App\Policies;

use App\User;
use App\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     * @param User $user
     * @param Note $task
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, Task $task)
    {
        return $user->id === $note->user_id;
    }
}
