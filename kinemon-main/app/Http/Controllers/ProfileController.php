<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile/edit');
    }

    public function update()
    {
        $data = [
            'name' => \request('name'),
            'email' => \request('email'),
        ];

        if (\request()->file('img')) {
            $data['img'] = \request()->file('img')->store('public/images');
        }

        auth()->user()->update($data);

        return back()->with('message', 'Success!');
    }

    public function password()
    {
        return view('profile/password');
    }

    public function updatePassword()
    {
        request()->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'confirmed'],
        ]);

        if (!Hash::check(request('old_password'), auth()->user()->password)) {
            return back()->withErrors(['msg' => 'The old password is not correct!']);
        }

        auth()->user()->update([
            'password'=> Hash::make(request('new_password'))
        ]);

        return back()->with('message', 'Success!');
    }
}
