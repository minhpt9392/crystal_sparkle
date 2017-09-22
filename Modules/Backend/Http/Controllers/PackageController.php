<?php
namespace Modules\Backend\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackageType;
use App\Models\PackageSale;
use App\Models\Customer;
use App\Models\RefundPackage;
use App\Models\Staff;



class PackageController extends BaseController
{
    public function addPackageType(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend::package.packageType');
        }
        $messages = [
            'type.required'        => 'Please select a Item Type',
            'name.required'        => 'Package Name cannot be null',
            'price.required'       => 'Price cannot be null',
            'price.numeric'        => 'Price number must be numeric',
            'bonus_price.required' => 'Bonus Price cannot be null',
            'bonus_price.numeric'  => 'Bonus Price number must be numeric',
            'period.required'      => 'Validity Time Period cannot be null',
            'period.integer'       => 'Validity Time Period number must be integer',
            'commission.required'  => 'Commission Amount cannot be null',
            'commission.numeric'   => 'Commission Amount number must be numeric',
            'range.required'       => 'Please select a Package range',
        ];
        $validator = Validator::make($request->all(), [
            'name'         => 'required' ,
            'type'         => 'required' ,
            'price'        => 'required|numeric',
            'bonus_price'  => 'required|numeric',
            'period'       => 'required|integer',
            'commission'   => 'required|numeric',
            'range'        => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/package/create-type')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $name       = $request->input('name');
            $type       = $request->input('type');
            $price      = $request->input('price');
            $bonus      = $request->input('bonus_price');
            $period     = $request->input('period');
            $commission = $request->input('commission');
            $range      = $request->input('range');
            PackageType::addPackage($name, $type, $price, $bonus, $period, $commission, $range);
            return redirect('/admin/package/list-type');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/package/create-type')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function editPackageType(Request $request, $id = null)
    {
        if($request->isMethod('get'))
        {
            $packageType = PackageType::getPackageInfoById($id);
            return view('backend::package.packageType',[ 'packageType' => $packageType]);
        }
        $messages = [
            'type.required'        => 'Please select a Item Type',
            'name.required'        => 'Package Name cannot be null',
            'price.required'       => 'Price cannot be null',
            'price.numeric'        => 'Price number must be numeric',
            'bonus_price.required' => 'Bonus Price cannot be null',
            'bonus_price.numeric'  => 'Bonus Price number must be numeric',
            'period.required'      => 'Validity Time Period cannot be null',
            'period.integer'       => 'Validity Time Period number must be integer',
            'commission.required'  => 'Commission Amount cannot be null',
            'commission.numeric'   => 'Commission Amount number must be numeric',
            'range.required'       => 'Please select a Package range',
        ];
        $validator = Validator::make($request->all(), [
            'name'         => 'required' ,
            'type'         => 'required' ,
            'price'        => 'required|numeric',
            'bonus_price'  => 'required|numeric',
            'period'       => 'required|integer',
            'commission'   => 'required|numeric',
            'range'        => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/package/type/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $id         = $request->input('id');
            $name       = $request->input('name');
            $type       = $request->input('type');
            $price      = $request->input('price');
            $bonus      = $request->input('bonus_price');
            $period     = $request->input('period');
            $commission = $request->input('commission');
            $range      = $request->input('range');
            PackageType::editPackageType($id, $name, $type, $price, $bonus, $period, $commission, $range);
            return redirect('/admin/package/list-type');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/package/type/edit/'.$request->input('id'))->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function listPackageType(Request $request)
    {
        $packages = PackageType::listPackageType();
        return view('backend::package.listPackageType', [ 'packages' => $packages ]);
    }

    public function deletePackageType(Request $request)
    {
        $id = $request->input('id');
        PackageType::deletePackageType($id);
        return 1;
    }

    public function registerPackage(Request $request)
    {
        if ($request->isMethod('get')) {
            $customers  = Customer::getListCustomer();
            $package    = PackageType::getAllPackageType();
            $therapist  = Staff::getAllTherapist();
            $salers     = Staff::getAllSaler();
            return view('backend::package.registerPackage',
                ['customers'    => $customers,
                    'package'   => $package,
                    'therapist' => $therapist,
                    'salers'    => $salers]);
        }
        $messages = [
            'customer.required'             => 'Please select a Customer',
            'type.required'                 => 'Please select a Package Type',
            'start_date.required'           => 'Please select a Day',
            'sale.required'                 => 'Please select a Sale',
            'therapist.required'            => 'Please select a Therapist',
            'cash.required'                 => 'Cash Paid cannot be null',
            'cash.numeric'                  => 'Cash Paid must be integer',
            'nets.required'                 => 'NETS Paid cannot be null',
            'nets.numeric'                  => 'NETS Paid must be integer',
            'credit_card.required'          => 'Credit Card Paid cannot be null',
            'credit_card.numeric'           => 'Credit Card Paid must be integer',
            'start_prepaid.required'        => 'Start Prepaid Value cannot be null',
            'start_prepaid.numeric'         => 'Start Prepaid Value must be integer',
            'bonus_value.required'          => 'Bonus Value cannot be null',
            'bonus_value.numeric'           => 'Bonus Value must be integer',
            'balance_bonus_value.required'  => 'Balance Bonus Value cannot be null',
            'balance_bonus_value.numeric'   => 'Balance Bonus Value must be integer',
        ];
        $validator = Validator::make($request->all(), [
            'customer'              => 'required',
            'type'                  => 'required',
            'start_date'            => 'required',
            'sale'                  => 'required',
            'therapist'             => 'required',
            'cash'                  => 'required|numeric',
            'nets'                  => 'required|numeric',
            'credit_card'           => 'required|numeric',
            'start_prepaid'         => 'required|numeric',
            'bonus_value'           => 'required|numeric',
            'balance_bonus_value'   => 'required|numeric',
            ],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/package/register')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $customerId        = $request->input('customer');
            $packageType       = $request->input('type');
            $startDate         = $request->input('start_date');
            $endDate           = $request->input('expried');
            $saler             = $request->input('sale');
            $therapist         = $request->input('therapist');
            $cash              = $request->input('cash');
            $nets              = $request->input('nets');
            $creditCard        = $request->input('credit_card');
            $startPrepaid      = $request->input('start_prepaid');
            $bonusValue        = $request->input('bonus_value');
            $balanceBonusValue = $request->input('balance_bonus_value');

            $newstart = explode('-', $startDate);
            $startDate = $newstart[2].'-'.$newstart[0].'-'.$newstart[1];
            $newend = explode('-', $endDate);
            $endDate = $newend[2].'-'.$newend[0].'-'.$newend[1];

            $packageSale = PackageSale::addNewPackageSale($customerId, $packageType, $startDate, $endDate, $saler, $therapist, $cash,
                $nets, $creditCard, $startPrepaid, $bonusValue, $balanceBonusValue);
            return redirect('/admin/package/list-sold');
        } catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/package/register')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function getPackageInfor(Request $request)
    {
        $id = $request->input('id');
        $package = PackageType::getPackageInfoById($id);
        return $package;
    }

    public function getPeriodTimePackage(Request $request)
    {
        $id = $request->input('id');
        $period = PackageType::getPeriodTimeOfPackage($id);
        return $period;
    }

    public function listPackageSold(Request $request)
    {
        $listPackageSold = PackageSale::listPackageSold();
        foreach($listPackageSold as $p)
        {
            //convert start date and end date format from (yy--mm--dd) to (mm--dd--yy)
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->start_date, $start);
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->end_date,     $end);
            $p->start_date = $start[2][0] .'-'. $start[3][0] .'-'. $start[1][0];
            $p->end_date   = $end[2][0]   .'-'. $end[3][0]   .'-'. $end[1][0];
        }
        return view('backend::package.listPackageSold', ['listPackage' => $listPackageSold]);
    }

    public function refundPackage(Request $request)
    {
        if ($request->isMethod('get')) {
            $listPackage = PackageType::getAllPackageType();
            return view('backend::package.refundPackage', ['packages' => $listPackage]);
        }
        $messages = [
            'type.required'                => 'Please select a Package type',
            'purchase_date.required'       => 'Purchase Date cannot be null',
            'purchase_price.required'      => 'Purchase Price cannot be null',
            'purchase_price.numeric'       => 'Purchase Price must be numeric',
            'number_section.required'      => 'Number of Sections cannot be null',
            'number_section.integer'       => 'Number of Sections must be integer',
            'number_section_used.required' => 'Number of Sections Used cannot be null',
            'number_section_used.integer'  => 'Number of Sections Used must be integer',
            'refund_amount.required'       => 'Refund amount cannot be null',
            'refund_amount.numeric'        => 'Refund amount must be numeric',
            'reason.required'              => 'Reason cannot be null',
            'method.required'              => 'Please select a Refund method',
        ];
        $validator = Validator::make($request->all(), [
            'type'                 => 'required' ,
            'purchase_date'        => 'required' ,
            'purchase_price'       => 'required|numeric',
            'number_section'       => 'required|integer',
            'number_section_used'  => 'required|integer',
            'refund_amount'        => 'required|numeric',
            'reason'               => 'required',
            'method'               => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/package/refund')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $packageTypeID  = $request->input('type');
            $puchaseDate    = $request->input('purchase_date');
            $puchasePrice   = $request->input('purchase_price');
            $section        = $request->input('number_section');
            $sectionUsed    = $request->input('number_section_used');
            $refundAmount   = $request->input('refund_amount');
            $reason         = $request->input('reason');
            $method         = $request->input('method');

            $newstart = explode('-', $puchaseDate);
            $puchaseDate = $newstart[2].'-'.$newstart[0].'-'.$newstart[1];
            $newRefund = RefundPackage::addNewRefundPackage($packageTypeID, $puchaseDate, $puchasePrice,
                $section, $sectionUsed, $refundAmount, $reason, $method);
            return redirect()('/admin/package/refund');
        }catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/package/refund')->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function listRefundPackage(Request $request)
    {
        $packages = RefundPackage::listPackageRefund();
        foreach($packages as $p)
        {
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->purchase_date,     $end);
            $p->purchase_date = $end[2][0] .'-'. $end[3][0] .'-'. $end[1][0];
        }
        return view('backend::package.listRefundPackage',[ 'packages' => $packages ]);
    }

    public function editRefundPackage(Request $request, $id = null)
    {
        if($request->isMethod('get'))
        {
            $package = RefundPackage::getRefundPackageById($id);
            preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $package->purchase_date,     $end);
            $package->purchase_date = $end[2][0] .'-'. $end[3][0] .'-'. $end[1][0];
            $listPackage = PackageType::getAllPackageType();
            return view('backend::package.refundPackage',[ 'package' => $package, 'packages' => $listPackage ]);
        }
        $messages = [
            'type.required'                => 'Please select a Package type',
            'purchase_date.required'       => 'Purchase Date cannot be null',
            'purchase_price.required'      => 'Purchase Price cannot be null',
            'purchase_price.numeric'       => 'Purchase Price must be numeric',
            'number_section.required'      => 'Number of Sections cannot be null',
            'number_section.integer'       => 'Number of Sections must be integer',
            'number_section_used.required' => 'Number of Sections Used cannot be null',
            'number_section_used.integer'  => 'Number of Sections Used must be integer',
            'refund_amount.required'       => 'Refund amount cannot be null',
            'refund_amount.numeric'        => 'Refund amount must be numeric',
            'reason.required'              => 'Reason cannot be null',
            'method.required'              => 'Please select a Refund method',
        ];
        $validator = Validator::make($request->all(), [
            'type'                 => 'required',
            'purchase_date'        => 'required',
            'purchase_price'       => 'required|numeric',
            'number_section'       => 'required|integer',
            'number_section_used'  => 'required|integer',
            'refund_amount'        => 'required|numeric',
            'reason'               => 'required',
            'method'               => 'required'],
            $messages);
        if ($validator->fails()) {
            return redirect('/admin/package/list-refund/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $id             = $request->input('id');
            $packageTypeID  = $request->input('type');
            $purchaseDate   = $request->input('purchase_date');
            $purchasePrice  = $request->input('purchase_price');
            $section        = $request->input('number_section');
            $sectionUsed    = $request->input('number_section_used');
            $refundAmount   = $request->input('refund_amount');
            $reason         = $request->input('reason');
            $method         = $request->input('method');

            $newstart = explode('-', $purchaseDate);
            $purchaseDate = $newstart[2].'-'.$newstart[0].'-'.$newstart[1];
            $newRefund = RefundPackage::updateRefundPackage($id, $packageTypeID, $purchaseDate, $purchasePrice,
                $section, $sectionUsed, $refundAmount, $reason, $method);
            return redirect('/admin/package/list-refund');
        }catch (QueryException $e) {
            DB::rollback();
            Log::error('Exception: ' . $e->getMessage());
            return redirect('/admin/package/list-refund/edit/'.$request->input('id'))->with(array(
                'message' => 'Validate failed, try again, please!'
            ));
        }
    }

    public function deleteRefundPackage(Request $request)
    {
        $id = $request->input('id');
        RefundPackage::deleteRefundPackage($id);
        return 1;
    }
}