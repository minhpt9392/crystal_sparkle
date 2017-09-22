<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/7/2017
 * Time: 4:16 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PermissionRole extends Model
{
    protected $table='permission_role';
    use Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function deleteAll($role_id)
    {
        self::where('role_id', '=',$role_id)->delete();
    }

    public static function addPermissionRole($permission_id,$role_id)
    {
        $pr = new PermissionRole;
        $pr->permission_id = (int)$permission_id;
        $pr->role_id = (int)$role_id;
        $pr->save();
    }
}