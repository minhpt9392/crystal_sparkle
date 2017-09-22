<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 8/29/2017
 * Time: 1:28 PM
 */

namespace Modules\Backend\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/admin';
    public function showResetForm(Request $request, $token = null)
    {
        return view('backend::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function broker()
    {
        return Password::broker('admins');
    }
}