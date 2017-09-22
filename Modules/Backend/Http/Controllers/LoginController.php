<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 8/31/2017
 * Time: 3:25 PM
 */

namespace Modules\Backend\Http\Controllers;


use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(!Auth::guard('admin')->guest())
        {
            return redirect('/admin');
        }
        return View('backend::login.index')->with(['token' => null]);
    }
    public function process(Request $request)
    {
        $request = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $request['username'], 'password' => $request['password']])
        || Auth::guard('admin')->attempt(['name' => $request['username'], 'password' => $request['password']])
        || Auth::guard('admin')->attempt(['username' => $request['username'], 'password' => $request['password']])
        || Auth::guard('admin')->attempt(['phone_number' => $request['username'], 'password' => $request['password']])) {
            // Authentication passed...
            return redirect('/admin');
        }
        else
        {
            return redirect()->route('admin.login')
                ->with(['token' => null,
                    'flash_level' => 'danger',
                    'flash_message' => 'Username or password not vaild!']);
        }

    }
}