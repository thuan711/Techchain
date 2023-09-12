<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
Paginator::useBootstrap();
class UserController extends Controller
{
    // $perPage = 5;
    // $user = User::with('roles','permissions')->orderBy('id','DESC')->get()->paginate($perPage);
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     $this->middleware('permission:publish articles|edit articles',['only'=>['index','show']]);
    //     $this->middleware('permission:publish articles|edit articles',['only'=>['index','show']]);
    //     $this->middleware('permission:publish articles|edit articles',['only'=>['index','show']]);
    //     $this->middleware('permission:publish articles|edit articles',['only'=>['index','show']]);
    // }
    public function index()
    {
        // Role::create(['name' => 'writer']);
        // Permission::create(['name' => 'add product']);
        // $role = Role::find(1);
        // $permission = Permission::find(1);
        // auth()->user()->assignRole('admin');
        // auth()->user()->givePermissionTo('edit product');
        // $role->givePermissionTo($permission);
        // $perPage = 5;
        $user = User::orderBy('id_user','DESC')->get();
        return view("admin.user.thanhvien",['user'=>$user]);
    }
    public function name($id_user)
    {
        $dh = User::find($id_user);

        if ($dh) {
            return $dh->name;
        }

        return 'Sản phẩm không tồn tại';
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // public function assignRole($id){
    //     $user = User::find($id);
    //     $name_roles = $user->roles->first()->name();
    //     $all_column_roles = $user->roles->first();
    //     $role = Role::orderBy('id','DESC')->get();
    //     return view('admin.thanhvien')->with(compact('role', 'all_column_roles','user','name_roles'));
    // }
    public function insert_role(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        return redirect()->back()->with('status', 'Thêm vai trò thành công');
    }
    public function insert_permisson(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        $role = Role::find($role_id);
        $role->syncPermissions($data['permissions']);
        return redirect()->back()->with('status', 'Thêm quyền cho user thành công');
    }
    
    public function phanquyen($id){
        $user = User::find($id);

        $name_roles = $user->roles->first()->name;
        $permission = Permission::orderBy('id','DESC')->get();
        return view('admin.user.phanquyen',compact('user','name_roles','permission'));
    }
    public function phanvaitro($id){
        $user = User::find($id);
        $all_column_roles = $user->roles->first();
        $role = Role::orderBy('id','DESC')->get();
        $permission = Permission::orderBy('id','DESC')->get();
        return view('admin.user.phanvaitro',compact('user','role','all_column_roles','permission'));
    }
}
