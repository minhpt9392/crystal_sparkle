<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/25/2017
 * Time: 9:00 AM
 */

namespace Modules\Frontend\Http\Controllers;


class HomeController extends BaseController
{
    public function index()
    {
        return view('frontend::home.index');
    }
}