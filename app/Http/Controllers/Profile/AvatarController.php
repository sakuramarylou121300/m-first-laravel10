<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;//this contains all the validation
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //this is the controller for updating avatar
    public function update(UpdateAvatarRequest $request){
        // validation to be read in Http/Request/ProfileUpdateRequest
        $path = $request->file('avatar')->store('avatars');
        // dd(auth()->user());//check the user
        auth()->user()->update(['avatar'=> storage_path('app')."/$path"]);//testing the update avatar
        dd(auth()->user()->fresh());
        // store, the word avatars enclose with parenthesis, that is the folder where the photos will be saved
       
        // when store is done then redirect to profile
        return response()
        ->redirectTo(route('profile.edit'))->with('message', 'Avatar is updated.');
    }   
}
