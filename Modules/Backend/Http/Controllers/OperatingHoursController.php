<?php
namespace Modules\Backend\Http\Controllers;

use App\Models\ShopOpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OperatingHoursController extends BaseController
{
    public function setOperation(Request $request)
    {
        if($request->isMethod('get'))
        {
            $shopId = 1; //REMEMBER TO CHANGE THIS
            $curSet = ShopOpeningHour::getCurrentSetting($shopId);
            return view('backend::operatingHours.setOperationHour', [ 'curSet' => $curSet ]);
        }
        $messages = [
            'day_from.required'    => 'Day From cannot be null',
            'day_to.required'      => 'Day To cannot be null',
            'night_from.required'  => 'Night From cannot be null',
            'night_to.required'    => 'Night To cannot be null',
        ];
        $validator = Validator::make($request->all(), [
            'day_from'    => 'required|date_format:"G:i:s"',
            'day_to'      => 'required|date_format:"G:i:s"',
            'night_from'  => 'required|date_format:"G:i:s"',
            'night_to'    => 'required|date_format:"G:i:s"'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/operating-hours/set')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $shopId      = 1; //REMEMBER TO CHANGE THIS
            $dayFrom     = $request->input('day_from');
            $dayTo       = $request->input('day_to');
            $nightFrom   = $request->input('night_from');
            $nightTo     = $request->input('night_to');
            ShopOpeningHour::setOperationTime($shopId, $dayFrom, $dayTo, $nightFrom, $nightTo);
            return redirect('/admin/operating-hours/list');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/operating-hours/set')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function listOperation(Request $request)
    {
        if($request->isMethod('get'))
        {
            $list = ShopOpeningHour::getListOperation();
            return view('backend::operatingHours.listOperatingHours',[ 'list' => $list ]);
        }
    }

    public function deleteOperation(Request $request)
    {
        $id = $request->input('id');
        ShopOpeningHour::deleteOperation($id);
        return 1;
    }

    public function editOperation(Request $request, $id=null)
    {
        if($request->isMethod('get'))
        {
            $curSet = ShopOpeningHour::getCurrentSetting($id);
            return view('backend::operatingHours.setOperationHour', [ 'curSet' => $curSet ]);
        }
        $messages = [
            'day_from.required'    => 'Day From cannot be null',
            'day_to.required'      => 'Day To cannot be null',
            'night_from.required'  => 'Night From cannot be null',
            'night_to.required'    => 'Night To cannot be null',
        ];
        $validator = Validator::make($request->all(), [
            'day_from'    => 'required|date_format:"G:i:s"',
            'day_to'      => 'required|date_format:"G:i:s"',
            'night_from'  => 'required|date_format:"G:i:s"',
            'night_to'    => 'required|date_format:"G:i:s"'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/operating-hours/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $shopId      = $id;
            $dayFrom     = $request->input('day_from');
            $dayTo       = $request->input('day_to');
            $nightFrom   = $request->input('night_from');
            $nightTo     = $request->input('night_to');
            ShopOpeningHour::setOperationTime($shopId, $dayFrom, $dayTo, $nightFrom, $nightTo);
            return redirect('/admin/operating-hours/setting');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/operating-hours/setting'.$request->input('id'))->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }
}