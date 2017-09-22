<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/7/2017
 * Time: 9:20 AM
 */

namespace Modules\Backend\Http\Controllers;


use Illuminate\Routing\Controller;

class PaginationController extends Controller
{
    public function index($current_page, $total_page)
    {
        return view('backend::pagination.index')
            ->with('current_page',(int)$current_page)
            ->with('total_page',(int)$total_page);
    }
}