<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommissionScheme;

class CommissionSchemeController extends BaseController
{
    public function setCommission(Request $request)
    {
        return view('backend::commissionScheme.commissionSchemes');
    }

    public function setBaseModel(Request $request){
        $type      = $request->input('type');
        $role      = $request->input('role');
        $component = $request->input('component');
        $massage   = $request->input('massage');
        $package   = $request->input('package');
        $product   = $request->input('product');
        $info = CommissionScheme::setCommissionInfo($type, $role, $component, $massage, $package, $product);

    }

    public function getBaseInfo(Request $request){
        $type = $request->input('type');
        $role = $request->input('role');
        $info = CommissionScheme::getCommissionInfo($type, $role);
        return $info;
    }



}