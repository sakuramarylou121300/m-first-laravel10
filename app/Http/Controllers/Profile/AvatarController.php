<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //this is the controller for updating avatar
    public function update(){
        // store
        // when store is done then redirect to profile
        return response()
        ->redirectTo(route('profile.edit'));
    }   
}
