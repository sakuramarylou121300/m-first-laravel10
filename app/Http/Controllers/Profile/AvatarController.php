<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;//this contains all the validation
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;//this is for storing the images

class AvatarController extends Controller
{
    //this is the controller for updating avatar
    public function update(UpdateAvatarRequest $request){
        // validation to be read in Http/Request/ProfileUpdateRequest
        //first it will be save in public, then under public in avatars directory, then the request and the field name you want to update
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        // $path = $request->file('avatar')->store('avatars','public');
        
        //check first before updating, if there is already a file saved, then it will delete the old avatar, only one avatar should be saved
        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }
        
        // dd(auth()->user());//check the user
        auth()->user()->update(['avatar'=> $path]);//testing the update avatar
        // dd(auth()->user()->fresh());
        // store, the word avatars enclose with parenthesis, that is the folder where the photos will be saved
       
        // when store is done then redirect to profile
        return response()
        ->redirectTo(route('profile.edit'))->with('message', 'Avatar is updated.');
    }   
}
