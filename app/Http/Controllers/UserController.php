<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use DB;

class UserController extends Controller
{
    public function index()
    {
    	$user = User::orderBy('created_at', 'DESC')->paginate(10);
    	return view('pages.user.index', compact('user'));
    }

    public function create()
    {
    	$role = Role::orderBy('name', 'ASC')->get();
    	return view('pages.user.form', compact('role'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name'		=> 'required|string|max:100',
    		'username'	=> 'required|string|max:15|unique:users',
    		'email'		=> 'required|email|unique:users',
    		'password'	=> 'required|min:6',
    		'role'		=> 'required|string|exists:roles,name'
    	]);
    	$user = User::firstOrCreate([
    		'email'		=> $request->email,
    	], [
    		'name'		=> $request->name,
    		'username'	=> $request->username,
    		'password'	=> bcrypt($request->password),
    		'status'	=> true
    	]);
    	$user->assignRole($request->role);
    	return redirect(route('user.index'))->with(['success' => 'Akun baru berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $role = Role::orderBy('name', 'ASC')->get();
    	$user = User::findOrFail($id);
    	return view('pages.user.form', compact('user', 'role'));
    }

    public function update(Request $request, $id)
    {
    	$user = User::findOrFail($id);
    	$this->validate($request, [
    		'name'		=> 'required|string|max:100',
    		'username'	=> 'required|string|max:15|unique:users,username,'.$user->id,
    		'email'		=> 'required|email|exists:users,email',
    		'password'	=> 'nullable|min:6',
    	]);
    	$password = !empty($request->password) ? bcrypt($request->password):$user->password;
    	$user->update([
    		'name'		=> $request->name,
    		'username'	=> $request->username,
    		'password'	=> $password
    	]);
    	return redirect(route('user.index'))->with(['success' => 'Akun baru berhasil diperbaharui']);
    }

    public function destroy($id)
    {
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->back()->with(['success' => 'Akun berhasil dihapus']);
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('pages.user.role', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role'  => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect(route('user.index'))->with(['success' => 'Role berhasil di set untuk Akun']);
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');
        $permissions = null;
        $hasPermission = null;
        $roles = Role::all()->pluck('name');
        if (!empty($role)) {
            $getRole = Role::findByName($role);
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();
            $permissions = Permission::all()->pluck('name');
        }
        return view('pages.user.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string|unique:permissions'
        ]);
        $permissions = Permission::firstOrCreate([
            'name'  => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        $role = Role::findByName($role);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission ke Role tersimpan!']);
    }
}
