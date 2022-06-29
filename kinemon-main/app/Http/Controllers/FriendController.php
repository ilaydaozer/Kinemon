<?php

namespace App\Http\Controllers;

use App\Models\User;

class FriendController extends Controller
{
    public function friend()
    {
        $friends = auth()->user()->friends;

        $suggestedFriend = null;
        if ($search = request('search')) {
            $suggestedFriend = User::query()
                ->where('username', $search)
                ->where('id', '!=', auth()->id())
                ->first();
        }

        return view('friends/friends', compact('friends', 'suggestedFriend'));
    }

    public function detail(User $user)
    {
        return view('friends/detail', compact('user'));
    }

    public function add(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->withErrors(['msg' => 'You can not add yourself!']);
        } elseif (auth()->user()->friends()->where('friend_id', $user->id)->first()) {
            return back()->withErrors(['msg' => 'You are already friends!']);
        }

        auth()->user()->friends()->attach([$user->id]);

        return back()->with('message', 'Success!');
    }

    public function remove(User $user)
    {
        auth()->user()->friends()->detach([$user->id]);

        return back()->with('message', 'Success!');
    }
}
