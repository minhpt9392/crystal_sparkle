<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/7/2017
 * Time: 4:18 PM
 */

namespace App;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table='role_user';
    public $timestamps = false;
    public static function deleteByRoleId($role_id)
    {
        self::where('role_id','=',$role_id)->delete();
    }
}