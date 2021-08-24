<?php

namespace App\Http\Controllers;

//App directory is here
use App\Models\User;
// use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index( User $user)
    {
       // $user = User::findOrFail($user);
        // Instead defined the user variable to point it,
        //put it with path like i put it >>\App\User $user *i will remove App directory
        // from path because it is there with imports at first
        // that means from "App" directory ,"User" class,
        // "$user" variable, which i want to get it
        //, thi is easy way rather than ,define the var..

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember('count.posts.' . $user->id,
            now()->addSeconds(30),
            function() use ($user) {
             return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember('count.following.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return  $user->following->count();
            });

        return view('profiles.index',compact('user', 'follows','postCount', 'followersCount', 'followingCount'));

    }

    public function edit(User $user)
    {
        //This is more secure -layer-
        $this->authorize('update',$user->profile);

        return view('profiles.edit', compact('user'));

    }

    public function update(User $user)
    {
        //This is more secure -layer-
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'',
            'image'=>'',
        ]);

        //if there is image with update
        if(request('image')){
            $imagePath = request('image')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath ];

        }

        //For secure use auth()
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
