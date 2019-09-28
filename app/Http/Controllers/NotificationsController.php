<?php

namespace App\Http\Controllers;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use App\User;
class NotificationsController extends Controller
{
   
    public function index()
    {
        $user = User::find(11);
        // $user = auth()->user();
    
        return[
            'read' => NotificationResource::collection($user->readNotifications),
            'unread' => NotificationResource::collection($user->unReadNotifications),
        ];
    }

    public function markAsRead(Request $request)
    {
        $user = User::find(11);
        $user->notifications->where('id',$request->id)->markAsRead();
    }
}
