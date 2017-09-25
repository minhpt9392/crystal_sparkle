<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/25/2017
 * Time: 9:00 AM
 */

namespace Modules\Frontend\Http\Controllers;


use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}