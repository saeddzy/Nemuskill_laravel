<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Plan $plan)
    {
        return $user->id === $plan->user_id;
    }

    public function delete(User $user, Plan $plan)
    {
        return $user->id === $plan->user_id;
    }
} 