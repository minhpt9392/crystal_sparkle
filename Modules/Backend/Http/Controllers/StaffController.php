<?php
namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;

class StaffController extends BaseController
{
    public function listTherapist(Request $request)
    {
        if($request->isMethod('get'))
        {
            $listThe = Staff::getAllTherapist();
            foreach ($listThe as $p )
            {
                preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->passport_expiry,     $end);
                $p->passport_expiry = $end[2][0] .'-'. $end[3][0] .'-'. $end[1][0];
                preg_match_all('/(\d{4})\-(\d{2})\-(\d{2})/', $p->permit_expiry,     $end);
                $p->permit_expiry = $end[2][0] .'-'. $end[3][0] .'-'. $end[1][0];
            }
            return view('backend::staff.listTherapist',[ 'listThe' => $listThe ]);
        }
    }

}