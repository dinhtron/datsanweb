<?php
// trong app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index()
    {    $userId = session('admin_id');
        if (!$userId) {
            abort(404, 'Không tìm thấy');
        }
        $products = DB::table('sanpham')->get();
         return view('products.all-in-one', compact('products'));
  
    }

    public function create()
    {
        return view('products.all-in-one');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tensanpham' => 'required|string',
            'gia' => 'required|numeric',
            'hinhanh' => 'required|string',
        ]);

        DB::table('sanpham')->insert([
            'tensanpham' => $request->input('tensanpham'),
            'gia' => $request->input('gia'),
            'hinhanh' => $request->input('hinhanh'),
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm vào cơ sở dữ liệu thành công');
    }

    public function edit($id)
    {
        $product = DB::table('sanpham')->where('id_sanpham', $id)->first();
        $products = DB::table('sanpham')->get();
        return view('products.all-in-one', compact('product', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tensanpham' => 'required|string',
            'gia' => 'required|numeric',
            'hinhanh' => 'required|string',
        ]);

        DB::table('sanpham')->where('id_sanpham', $id)->update([
            'tensanpham' => $request->input('tensanpham'),
            'gia' => $request->input('gia'),
            'hinhanh' => $request->input('hinhanh'),
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        DB::table('sanpham')->where('id_sanpham', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công');
    }
}
