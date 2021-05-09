<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1対1の場合のチャットルームIDを取得
    public function roomId ($partnerId)
    {
        $rooms = $this->hasMany('App\RoomUser')->get();

        $roomId = null;
        foreach ($rooms as $room) {
            $roomRecord = RoomUser::where('room_id', $room->room_id)
                    ->where('user_id', $partnerId)
                    ->first();
            if ($roomRecord) {
                $roomId = $roomRecord->room_id;
            }
        }

        return $roomId;
    }
}
