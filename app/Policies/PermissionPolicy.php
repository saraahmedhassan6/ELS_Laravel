<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function addTeacher(User $user)
    {
        return $user->role->name === 'Admin';
    }
    
    public function viewTeacher(User $user)
    {
        return $user->role->name === 'Admin';
    }

    public function addStudent(User $user)
    {
        return $user->role->name === 'Admin';
    }
    
    public function viewStudent(User $user)
    {
        return $user->role->name === 'Admin';
    }

    
}
