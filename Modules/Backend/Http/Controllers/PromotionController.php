<?php
namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Promotion;
use App\Models\Shop;
use App\Models\MassageServiceItem;
use App\Models\OnGoingPromotion;


class PromotionController extends BaseController
{
    public function assignPromotion(Request $request)
    {
        if ($request->isMethod('get')) {
            $shops    = Shop::getListShopName();
            $messages = MassageServiceItem::getAllMassageItem();
            return view('backend::promotion.assignPromotion', ['shops' => $shops, 'messages' => $messages]);
        }
        $messages = [
            'code.required'               => 'Code cannot be null',
            'shop.required'               => 'Please select a shop',
            'start_date.required'         => 'Code cannot be null',
            'end_date.required'           => 'Code cannot be null',
            'massage_id.required'         => 'Please select a Massage Item',
            'discount_type.required'      => 'Please select Discount Type',
            'room_number.numeric'         => 'Room number must be numeric',
            'discount_rate.required'      => 'Discount Rate cannot be null',
            'discount_rate.numeric'       => 'Room number must be numeric',
            'discount_flat_rate.required' => 'Discount Flat Rate cannot be null',
            'discount_flat_rate.numeric'  => 'Room number must be numeric',
        ];
        switch ($request->input('discount_type'))
        {
            case 1 :
                $validator = Validator::make($request->all(), [
                    'code'          => 'required',
                    'shop'          => 'required',
                    'start_date'    => 'required',
                    'end_date'      => 'required',
                    'massage_id'    => 'required',
                    'discount_type' => 'required',
                    'discount_rate' => 'required|numeric',
                ],$messages);
                break;
            case 2 :
                $validator = Validator::make($request->all(), [
                    'code'               => 'required',
                    'shop'               => 'required',
                    'start_date'         => 'required',
                    'end_date'           => 'required',
                    'massage_id'         => 'required',
                    'discount_type'      => 'required',
                    'discount_flat_rate' => 'required|numeric',
                ],$messages);
                break;
        }
        if ($validator->fails()) {
            return redirect('/admin/promotion/assign')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $code          = $request->input('code');
            $shopId        = $request->input('shop');
            $start         = $request->input('start_date');
            $end           = $request->input('end_date');
            $massageId     = $request->input('massage_id');
            $discountType  = $request->input('discount_type');
            $rate          = $request->input('discount_rate');
            $flatRate      = $request->input('discount_flat_rate');
            //convert start and end time to format of DB(yy-mm-dd)
            $newstart = explode('-', $start);
            $newend   = explode('-', $end);
            $start    = $newstart[2] .'-'. $newstart[0] .'-'. $newstart[1];
            $end      = $newend[2]   .'-'. $newend[0]   .'-'. $newend[1];
            Promotion::addNewPromotion($code, $shopId, $start, $end, $massageId, $discountType, $rate, $flatRate);
            return redirect('/admin/promotion/list');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/promotion/assign')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function listPromotion(Request $request)
    {
        $promotions = Promotion::getAllPromotions();
        foreach ($promotions as $promotion)
        {
            //convert start date and end date format from (yy--mm--dd) to (mm--dd--yy)
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $promotion->start_date, $start);
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $promotion->end_date,     $end);
            $promotion->start_date = $start[2][0] .'-'. $start[3][0] .'-'. $start[1][0];
            $promotion->end_date   = $end[2][0]   .'-'. $end[3][0]   .'-'. $end[1][0];
        }
        return view('backend::promotion.listPromotion', ['promotions' => $promotions]);
    }

    public function deletePromotion(Request $request)
    {
        $id = $request->input('id');
        Promotion::deletePromotion($id);
        return 1;
    }

    public function editPromotion(Request $request, $id = null)
    {
        if ($request->isMethod('get')) {
            $promotion = Promotion::getPromotionByID($id);
            $shops     = Shop::getListShopName();
            $messages  = MassageServiceItem::getAllMassageItem();
            //convert start date and end date format from (yy--mm--dd) to (mm--dd--yy)
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $promotion->start_date, $start);
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $promotion->end_date,     $end);
            $promotion->start_date = $start[2][0] .'-'. $start[3][0] .'-'. $start[1][0];
            $promotion->end_date   = $end[2][0]   .'-'. $end[3][0]   .'-'. $end[1][0];
            return view('backend::promotion.assignPromotion', ['shops' => $shops, 'messages' => $messages, 'promotion' => $promotion]);
        }
        $id            = $request->input('id');
        $code          = $request->input('code');
        $shopId        = $request->input('shop');
        $start         = $request->input('start_date');
        $end           = $request->input('end_date');
        $itemType      = $request->input('massage_id');
        $discountType  = $request->input('discount_type');
        $rate          = $request->input('discount_rate');
        if ($rate == null) {
            $rate      = $request->input('discount_flat_rate');
        }
        //convert start and end time to format of DB(yy-mm-dd)
        $newstart = explode('-', $start);
        $newend   = explode('-', $end);
        $start    = $newstart[2] .'-'. $newstart[0] .'-'. $newstart[1];
        $end      = $newend[2]   .'-'. $newend[0]   .'-'. $newend[1];
        $promotion = Promotion::updatePromotion($id, $code, $shopId, $start, $end, $itemType, $discountType, $rate);
        return redirect('/admin/promotion/list');
    }

    public function ongoingPromotion(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('backend::promotion.onGoingPromotion');
        }
        $messages = [
            'number_expenditure.required'    => 'Please select a Number of Expenditures required',
            'time_period.required'           => 'Please select a Time period to count',
            'free_service.numeric'           => 'Please select a Number of free services given',
            'start_date.required'            => 'Start date cannot be null',
            'end_date.required'              => 'End date cannot be null',
        ];
        $validator = Validator::make($request->all(), [
            'number_expenditure'  => 'required|integer|max:50|min:1',
            'time_period'         => 'required|integer|max:366|min:1',
            'free_service'        => 'required|integer|max:50|min:1',
            'start_date'          => 'required',
            'end_date'            => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/on-going-promotion/create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $noExpenditure  = $request->input('number_expenditure');
            $timePeriod     = $request->input('time_period');
            $freeService    = $request->input('free_service');
            $discounted     = $request->input('type1');
            $packages       = $request->input('type2');
            $startDate      = $request->input('start_date');
            $endDate        = $request->input('end_date');
            //convert start and end time to format of DB(yy-mm-dd)
            $newstart     = explode('-', $startDate);
            $newend       = explode('-', $endDate);
            $startDate    = $newstart[2] .'-'. $newstart[0] .'-'. $newstart[1];
            $endDate      = $newend[2]   .'-'. $newend[0]   .'-'. $newend[1];
            OnGoingPromotion::createPromotion($noExpenditure, $timePeriod, $freeService, $discounted, $packages, $startDate, $endDate);
            return redirect('/admin/on-going-promotion/list');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/on-going-promotion/create')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function listOnGoingPromotion(Request $request)
    {
        if($request->isMethod('get'))
        {
            $list = OnGoingPromotion::listOnGoingPromotion();
            foreach($list as $p)
            {
                preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->start_date, $start);
                preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->end_date,     $end);
                $p->start_date = $start[2][0] .'-'. $start[3][0] .'-'. $start[1][0];
                $p->end_date   = $end[2][0]   .'-'. $end[3][0]   .'-'. $end[1][0];
            }
            return view('backend::promotion.listOnGoingPromotion',[ 'promotion' => $list ]);
        }
    }

    public function editOnGoingPromotion(Request $request, $id = null)
    {
        if($request->isMethod('get'))
        {
            $promotion = OnGoingPromotion::getOnGoingPromotionById($id);
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $promotion->start_date, $start);
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $promotion->end_date,     $end);
            $promotion->start_date = $start[2][0] .'-'. $start[3][0] .'-'. $start[1][0];
            $promotion->end_date   = $end[2][0]   .'-'. $end[3][0]   .'-'. $end[1][0];
            return view('backend::promotion.onGoingPromotion',[ 'promotion' => $promotion ]);
        }
        $messages = [
            'number_expenditure.required'    => 'Please select a Number of Expenditures required',
            'time_period.required'           => 'Please select a Time period to count',
            'free_service.numeric'           => 'Please select a Number of free services given',
            'start_date.required'            => 'Start date cannot be null',
            'end_date.required'              => 'End date cannot be null',
        ];
        $validator = Validator::make($request->all(), [
            'number_expenditure'  => 'required|integer|max:50|min:1' ,
            'time_period'         => 'required|integer|max:366|min:1',
            'free_service'        => 'required|integer|max:50|min:1',
            'start_date'          => 'required',
            'end_date'            => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/on-going-promotion/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $id             = $request->input('id');
            $noExpenditure  = $request->input('number_expenditure');
            $timePeriod     = $request->input('time_period');
            $freeService    = $request->input('free_service');
            $discounted     = $request->input('type1');
            $packages       = $request->input('type2');
            $startDate      = $request->input('start_date');
            $endDate        = $request->input('end_date');
            //convert start and end time to format of DB(yy-mm-dd)
            $newstart     = explode('-', $startDate);
            $newend       = explode('-', $endDate);
            $startDate    = $newstart[2] .'-'. $newstart[0] .'-'. $newstart[1];
            $endDate      = $newend[2]   .'-'. $newend[0]   .'-'. $newend[1];
            OnGoingPromotion::editPromotion($id, $noExpenditure, $timePeriod, $freeService, $discounted, $packages, $startDate, $endDate);
            return redirect('/admin/on-going-promotion/list');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/on-going-promotion/create'.$request->input('id'))->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function deleteOnGoingPromotion(Request $request)
    {
        $id = $request->input('id');
        OnGoingPromotion::deleteOnGoingPromotion($id);
        return 1;
    }
}