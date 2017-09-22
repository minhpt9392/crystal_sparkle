<?php
namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resign;
use App\Models\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;



class ResignController extends BaseController
{
    public function addFireAndResign(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend::fireAndResign.add');
        } else if ($request->isMethod('post')) {
            $messages = [
                'staff.required'        => 'Please select a staff',
                'action_date.date'      => 'Please input a valid date',
                'permit_cancel_date.date'    => 'Please input a valid date',
            ];
            $validator = Validator::make($request->all(), [
                'staff'                  => 'required' ,
                'action_date'           => 'date',
                'permit_cancel_date'    => 'date'],
                $messages);
            if ($validator->fails()) {
                return redirect('/admin/add-resign')
                    ->withErrors($validator)
                    ->withInput();
            }
            try {
                $staffId     = $request->input('staff');
                $type = $request->input('resign_type');
                $actionDate   = $request->input('action_date');
                $permitCancelDate = $request->input('permit_cancel_date');
                $reason = $request->input('reason');
                Resign::addResign($staffId, $type, $actionDate, $permitCancelDate, $reason);
                return redirect('/admin/add-resign');
            } catch (QueryException $e) {
                DB::rollback();
                Log::error('Exception: ' . $e->getMessage());
                return redirect('/admin/add-new-room')->with(array(
                    'message' => 'Validate failed, try again, please!'
                ));
            }
        }

    }

    public function listFireAndResign(Request $request)
    {
        if ($request->isMethod('get')) {
            $listResign = Resign::getListResign();
            return view('backend::fireAndResign.list', ['listResign' => $listResign]);
        }
    }
}