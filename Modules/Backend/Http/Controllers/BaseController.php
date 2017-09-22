<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 8/31/2017
 * Time: 3:45 PM
 */

namespace Modules\Backend\Http\Controllers;


use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}