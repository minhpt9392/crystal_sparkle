<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 8/29/2017
 * Time: 10:25 AM
 */

namespace Modules\Backend\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('backend::auth.passwords.email');
    }
    public function broker()
    {
        return Password::broker('admins');
    }
}