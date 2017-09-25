<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/25/2017
 * Time: 9:02 AM
 */

namespace Modules\Frontend\Http\Controllers;


use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend::login.index');
    }
}