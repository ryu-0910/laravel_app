<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\RoomUser;
use App\Message;

class Chat extends Controller
{
    public function index(Request $request, $partnerId)
    {
        $user = $request->user();
        $partnerId = (int)$partnerId;
        $userIds = [$user->id, $partnerId];
        
        $roomId = $user->roomId($partnerId);
        
        if (!$roomId) {
            $roomId = $this->createRoom($userIds);
        }
        
        if (!$roomId) {
            return redirect('home');
        }

        return view('chat.index', ['room_id' => $roomId]);
    }

    private function createRoom ($userIds) {
        DB::beginTransaction();
        try {
            $room = Room::create([
                'name' => ''
            ]);
            $roomId = $room->id;

            foreach($userIds as $userId) {
                RoomUser::create([
                    'room_id' => $roomId,
                    'user_id' => $userId
                ]);
            }
            
            DB::commit();

            return $roomId;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
