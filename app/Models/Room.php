<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    protected $table='rooms';
    public $timestamps = false;

    public static function addNewRoom($shopId, $roomNumber, $roomName){
        $room = new Room;
        $room->name    = $roomName;
        $room->shop_id = $shopId;
        $room->number  = $roomNumber;
        $room->save();
    }

    public static function getListRoom(){
        $rooms = DB::table('rooms')
            ->join('shops','shops.id','=','rooms.shop_id')
            ->select('rooms.*','shops.business_name as shopName')
            ->orderby('shopName')
            ->get();
        return $rooms;
    }

    public static function getRoomById($id)
    {
        $room = DB::table('rooms')
            ->where('id',$id)
            ->first();
        return $room;
    }

    public static function editRoom($id, $shopId, $roomNumber, $roomName)
    {
        $room = Room::find($id);
        $room->number = $roomNumber;
        $room->name = $roomName;
        $room->shop_id = $shopId;
        $room->save();
    }
}
