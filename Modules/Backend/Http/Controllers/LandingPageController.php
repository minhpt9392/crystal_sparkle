<?php

namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends BaseController
{
    public function landingPage()
    {
        return view('backend::landingPage.landingPage');
    }
}