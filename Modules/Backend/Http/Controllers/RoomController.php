<?php
namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class RoomController extends BaseController
{
    public function addNewRoom(Request $request)
    {
        if ($request->isMethod('get')) {
            $shops = Shop::getListShopName();
            return view('backend::room.addNewRoom', ['shops' => $shops]);
        }
        $messages = [
            'shop.required'        => 'Please select a shop',
            'room_number.required' => 'Room number cannot be null',
            'room_number.numeric'  => 'Room number must be numeric',
            'room_name.required'   => 'Room name cannot be null',
        ];
        $validator = Validator::make($request->all(), [
            'shop'         => 'required' ,
            'room_number'  => 'required|numeric',
            'room_name'    => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/room/create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $shopId     = $request->input('shop');
            $roomNumber = $request->input('room_number');
            $roomName   = $request->input('room_name');
            Room::addNewRoom($shopId, $roomNumber, $roomName);
            return redirect('/admin/room/list');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/room/create')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function getListRoom(Request $request)
    {
        $rooms = Room::getListRoom();
        return view('backend::room.listRoom',[ 'rooms' => $rooms ]);
    }

    public function editRoom(Request $request, $id=null)
    {
        if($request->isMethod('get'))
        {
            $room = Room::getRoomById($id);
            $shops = Shop::getListShopName();
            return view('backend::room.addNewRoom', [ 'room' => $room, 'shops' => $shops ]);
        }
        $messages = [
            'shop.required'        => 'Please select a shop',
            'room_number.required' => 'Room number cannot be null',
            'room_number.numeric'  => 'Room number must be numeric',
            'room_name.required'   => 'Room name cannot be null',
        ];
        $validator = Validator::make($request->all(), [
            'shop'         => 'required' ,
            'room_number'  => 'required|numeric',
            'room_name'    => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/room/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $shopId     = $request->input('shop');
            $roomNumber = $request->input('room_number');
            $roomName   = $request->input('room_name');
            $id         = $request->input('id');
            Room::editRoom($id, $shopId, $roomNumber, $roomName);
            return redirect('/admin/room/list');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/room/edit/'.$request->input('id'))->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }

    }
}