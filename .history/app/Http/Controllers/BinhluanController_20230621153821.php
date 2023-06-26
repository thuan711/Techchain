<?php

namespace App\Http\Controllers;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
class BinhluanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 5;
        $bl = \App\Models\Binhluan::paginate($perPage);
        return view("admin.binhluan", ['binhluan'=>$bl] );
    }
    public function ten_sp($id_sp)
    {
        $sp = Sanpham::find($id_sp);

        if ($sp) {
            return $sp->ten_sp;
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
        $bl = \App\Models\Binhluan::find($id);
        if ($bl==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id không tồn tại");
            redirect("/thongbao");
        }
        $bl->delete();
        return redirect('/admin/binhluan');
    }
}
