<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view("backend.pages.permission.all-permission", compact("permissions"));
    }

    public function AddPermission()
    {
        return view("backend.pages.permission.add-permission");
    }

    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'message' => 'Permission created successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit-permission', compact('permission'));
    }
    
    public function UpdatePermission(Request $request)
    {
        // Add validation if necessary
        $request->validate([
            'name' => 'required',
            'group_name' => 'required',
        ]);
    
        $per_id = $request->id;
    
        // Assuming 'group_name' is always present in the request
        Permission::findOrFail($per_id)->update($request->only(['name', 'group_name']));
    
        $notification = [
            'message' => 'Permission updated successfully',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.permission')->with($notification);
    }

    public function deletePermission(Request $request, $id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    /////////// Role All Method

    public function  AllRoles()
    {
        $roles = Role::all();
        return view("backend.pages.roles.all-roles", compact("roles"));
    }

    public function AddRoles()
    {
        return view("backend.pages.roles.add-roles");
    }

    public function StoreRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Role created successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.roles')->with($notification);
    }


    public function EditRoles(Request $request, $id)
    {
        $roles = Role::findOrFail($id);

        return view('backend.pages.roles.edit-roles', compact('roles'));
    }


    public function UpdateRoles(Request $request)
    {
        // Add validation if necessary
        $request->validate([
            'name' => 'required',
        ]);

        $role_id = $request->id;

        // Assuming 'name' is always present in the request
        Role::findOrFail($role_id)->update(['name' => $request->name]);

        $notification = [
            'message' => 'Role updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.roles')->with($notification);
    }


    public function deleteRoles(Request $request, $id)
    {
        Role::findOrFail($id)->delete();

        $notification = [
            'message' => 'Role deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add-roles-permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
        

            DB::table('role_has_permissions')->insert($data);
        } // end foreach

        $notification = array(
            'message' => 'Role Permission created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all-roles-permission', compact('roles'));
    }

    public function AdminEditRoles($id)
    {
        $role = Role::findorFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.edit-roles-permission', compact('role', 'permissions', 'permission_groups'));
    }


    public function AdminRolesUpdate(Request $request, $id)
    {
        $role = Role::findorFail($id);
        $permissions = $request->permission;

        if(!empty($permissions))
        {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AdminDeleteRoles($id)
    {
        $role = Role::findOrFail($id);
        if(!is_null($role))
        {
            $role->delete();
        }
            $notification = array(
                'message' => 'Role deleted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.roles.permission')->with($notification);

    }

}