<?php
/**
 * Created by PhpStorm.
 * User: ThanhMinh92it
 * Date: 9/6/2017
 * Time: 10:34 AM
 */

namespace Modules\Backend\Http\Controllers;


use App\Permission;
use App\PermissionRole;
use App\Role;
use App\RoleUser;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class RoleController extends BaseController
{
    public function pagination($records,$search = null)
    {
        $per_page = is_null($records) ? 10 : $records;
        return view('backend::role.pagination')
            ->with('roles',Role::getRoles($per_page, $search))
            ->with('pages',Role::getPages($per_page, $search));
    }
    public function index()
    {
        $records = 10;
        return view('backend::role.index')
            ->with('roles',Role::getRoles($records))
            ->with('pages',Role::getPages($records));
    }
    public function view($id)
    {
        if(!Auth::guard('admin')->user()->can('view-role'))
        {
            return Abort(403);
        }
        $arrays = self::hasPermissions((int)$id);
        return view('backend::role.view')
            ->with('role', Role::getRoleById($id))
            ->with('permissions', $arrays);
    }
    /*
     * author: minhpt
     * create: 08/09/2017
     * description: edit role
     */
    public function edit(Request $request, $id=null)
    {
        try{
            if ($request->isMethod('get')) {
                $arrays = self::hasPermissions($id);
                return view('backend::role.edit', ['role' => Role::getRoleById($id),'permissions' => $arrays]);
            }
            $messages = [
                'name.required'               => 'Please specify a valid name.',
                'display_name.required'       => 'Please specify a valid display name.',
            ];
            $validator = Validator::make($request->all(), [
                'name'          => 'required',
                'display_name'  => 'required|min:3',
            ],$messages);
            if ($validator->fails()) {
                return redirect('/admin/role/edit/1')
                    ->withErrors($validator)
                    ->withInput();
            }
            $role_id = $request->input('id');
            $name = $request->input('name');
            $display_name = $request->input('display_name');
            $description = $request->input('description');
            $permissions = $request->permission;

            Role::updateRole($role_id, $name,$display_name,$description);
            PermissionRole::deleteAll($role_id);
            if(isset($permissions))
            {
                foreach ($permissions as $key => $permission)
                {
                    PermissionRole::addPermissionRole($key, $role_id);
                }
            }
            return \redirect('/admin/role/view/'.$role_id)->with([
                'flash_level' => 'success',
                'flash_message' => 'Complete update infomation for role has id is '. $role_id]);
        }
        catch (\QueryException $exception)
        {
            Log::error('RoleController->edit: ' . $exception);
            return \redirect('/admin/role/view/'.$request->input('id'))->with([
                'flash_level' => 'danger',
                'flash_message' =>'The system is faulty to contact administrator']);
        }
    }

    /*
     * author: minhpt
     * create: 08/09/2017
     * description: edit role
     */
    public function create(Request $request)
    {
        try{
            if ($request->isMethod('get')) {
                $arrays = self::hasPermissions();
                return view('backend::role.add',['permissions' => $arrays]);
            }
            $messages = [
                'name.required'               => 'Please specify a valid name.',
                'display_name.required'       => 'Please specify a valid display name.',
            ];
            $validator = Validator::make($request->all(), [
                'name'          => 'required',
                'display_name'  => 'required|min:3',
            ],$messages);
            if ($validator->fails()) {
                return redirect('/admin/role/create')
                    ->withErrors($validator)
                    ->withInput();
            }
            //$role_id = $request->input('id');
            $name = $request->input('name');
            $display_name = $request->input('display_name');
            $description = $request->input('description');
            $permissions = $request->permission;

            $role_id = Role::createRole($name,$display_name,$description);
            //PermissionRole::deleteAll($role_id);
            if(isset($permissions))
            {
                foreach ($permissions as $key => $permission)
                {
                    PermissionRole::addPermissionRole($key, $role_id);
                }
            }
            return \redirect('/admin/role/view/'.$role_id)->with([
                'flash_level' => 'success',
                'flash_message' => 'Complete update infomation for role has id is '. $role_id]);
        }
        catch (\QueryException $exception)
        {
            Log::error('RoleController->edit: ' . $exception);
            return \redirect('/admin/role/view/'.$request->input('id'))->with([
                'flash_level' => 'danger',
                'flash_message' =>'The system is faulty to contact administrator']);
        }
    }

    /*
     * author: minhpt
     * create: 08/09/2017
     * description: delete role
     */
    public function delete($id)
    {
        try{
            $id = (int)$id;
            PermissionRole::deleteAll($id);
            RoleUser::deleteByRoleId($id);
            Role::deleteRole($id);
            \redirect('/admin/role')->with([
                'flash_level' => 'success',
                'flash_message' =>'Delete finish']);
        }
        catch (\QueryException $exception)
        {
            Log::error('RoleController->delete: ' . $exception);
            return \redirect('/admin/role')->with([
                'flash_level' => 'danger',
                'flash_message' =>'The system is faulty to contact administrator']);
        }
    }
    /*
     * author: minhpt
     * create: 08/09/2017
     * description: get all permissions and role has permissions
     */
    public function hasPermissions($id = null)
    {
        $permissionArrays = Permission::getPermissions();
        if($id != null)
            $roleArrays = Role::getPermissionRole($id);
        $arrays = array();
        if(count($permissionArrays) > 0)
        {
            foreach ($permissionArrays as $permissionArray) {
                $array = [
                    'name' => $permissionArray['display_name'],
                    'has' => 0,
                    'id' => $permissionArray['id']
                ];
                if($id != null)
                {
                    if(count($roleArrays) > 0)
                    {
                        $ok = false;
                        foreach ($roleArrays as $roleArray) {
                            if ($roleArray->permissions_id == $permissionArray['id']) {
                                $ok = true;
                                break;
                            }
                        }
                        if ($ok) {
                            $array = [
                                'name' =>  $permissionArray['display_name'],
                                'has' => 1,
                                'id' => $permissionArray['id']
                            ];
                        }

                    }
                }
                array_push($arrays, $array);
            }
        }
        return $arrays;
    }
}