<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public static function getRoles($records,$search = null)
    {
        if(is_null($search))
            return self::paginate($records)->items();
        else
            return self::where('display_name','like','%' . $search .'%')
                ->orWhere('description','like','%' . $search .'%')
                ->paginate($records)->items();
    }
    public static function getPages($records,$search = null)
    {
        if(is_null($search))
            $total = count(self::get());
        else
            $total = count(self::where('display_name','like','%' . $search .'%')->paginate($records)->items());
        return ceil($total/$records);
    }
    public static function getRoleById ($id)
    {
        return self::where('id','=', $id)->first();
    }
    public static function getPermissionRole($id)
    {
        return self::select('roles.id as role_id','permissions.display_name as permission_display_name','permissions.id as permissions_id')->where('roles.id','=', $id)
            ->leftJoin('permission_role','roles.id','=','permission_role.role_id')
            ->leftJoin('permissions','permissions.id','=','permission_role.permission_id')
            ->get();
    }
    public static function updateRole($id, $name, $display_name, $description)
    {
        $role = self::where('id',$id)->first();
        $role->name = $name;
        $role->display_name = $display_name;
        $role->description = $description;
        $role->updated_at = date('Y-m-d H:i:s');
        $role->save();
    }
    public static function createRole($name, $display_name, $description)
    {
        $role = new Role;
        $role->name = $name;
        $role->display_name = $display_name;
        $role->description = $description;
        $role->created_at = date('Y-m-d H:i:s');
        $role->save();
        return $role->id;
    }
    public static function deleteRole($id)
    {
        self::where('id','=',$id)->delete();
    }
}
