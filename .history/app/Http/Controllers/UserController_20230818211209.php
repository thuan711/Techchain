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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 5;
        // $user = User::with('roles','permissions')->orderBy('id','DESC')->get()->paginate($perPage);
        return view("admin.thanhvien" );
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
    public function assignRole($id){
        $user = User::find($id);
        $name_roles = $user->roles->first()->name();
        $all_column_roles = $user->roles->first();
        $role = Role::orderBy('id','DESC')->get();
        return view('admin.thanhvien')->with(compact('role', 'all_column_roles','user','name_roles'));
    }
    public function insert_role(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        return redirect()->back()->with('status', 'Thêm vai trò thành công');
    }
}
