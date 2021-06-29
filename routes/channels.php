<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('home.{roomId}',function($user,$roomId){
    return $user->id;
    /* @ Only all *authenticated* users will have access listen
     * to this room. The roomId depends on the url */
});

Broadcast::channel('user.{roomId}.{id}',function($user,$roomId,$id){
    /***
     * You can only subscribe to this channel
     * if the $id you are subscribing is
     * the same user id under which you are authenticated
     */
    return (int) Auth::user()->id === (int) $id;
});
