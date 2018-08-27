<?php

namespace App\Http\Controllers\Api\Social;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\User;

class LikeController extends Controller
{
    /**
     * @return mixed
     */
    public function getLikesForCurrentUser()
    {
        $user = User::find(1);
        $thread = Thread::find(1);

        $user->like($thread);
    }
}
