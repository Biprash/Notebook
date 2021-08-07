<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function update(ProfileRequest $request)
    {
        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if ($request->profile_pic){
            if ($request->user()->userDetail)
            {
                $request->user()->userDetail->update([
                    'profile_pic' => $request->profile_pic->store('profile_pic')
                ]);
            } else {
                $request->user()->userDetail()->create([
                    'profile_pic' => $request->profile_pic->store('profile_pic')
                ]);
            }
        }
        $profile = new ProfileResource(auth()->user());
        return $this->success('Profile Updated Successfully', $profile);
    }

    public function show()
    {
        $profile = new ProfileResource(auth()->user());
        return $this->success('Profile Detail.', $profile);
    }
}
