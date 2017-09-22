<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 8/31/2017
 * Time: 3:44 PM
 */

namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{
    public function index()
    {
        return view('backend::home.index');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }

}