<?php
namespace Modules\Backend\Http\Controllers;


use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentSchemes(Request $request)
    {
        return view('backend::payment.paymentSchemes');
    }

    public function setPaymentMounthly(Request $request)
    {
        $date = $request->input('date');

    }

    public function setPaymentBiMounthly(Request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

    }

    public function setPaymentTriMounthly(Request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $date3 = $request->input('date3');

    }
}