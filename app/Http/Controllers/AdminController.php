<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Models\Shop;
use App\Models\Room;
use App\Models\MassageServiceItem;
use App\Models\Promotion;
use App\Models\PackageType;
use App\Models\PackageSale;
use App\Models\Customer;
use App\Models\RefundPackage;


class AdminController extends Controller
{
    public function addFireAndResign()
    {
        return view('admin.fireAndResign.add');
    }


    public function listFireAndResign()
    {
        return view('admin.fireAndResign.list');
    }

    public function addStaff()
    {
        return view('admin.staff.add');
    }

}
