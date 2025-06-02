<?php

namespace App\Policies;

use App\Models\User;

class SectionAccessPolicy
{
public function viewAdminPanel(User $user)
{
    return $user->role === 1;
}
    public function viewUserPanel(User $user)
    {
        return $user->role === 0; // Regular user has role = 0
    }
}
