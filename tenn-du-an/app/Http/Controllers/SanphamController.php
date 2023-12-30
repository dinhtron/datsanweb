<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SanphamController extends Controller
{
    public function getSanphamData() {
        $id = Session::get('id');
        $sanpham = sanpham::all();
        return view('sanpham.index', ['sanpham' => $sanpham,'id'=> $id]);
    }
    
    public function selectProduct(Request $request) {
        try {
            $productId = $request->input('productId');
            
            // Lưu productId vào session
            Session::put('selected_product', $productId);

            return response()->json(['success' => true, 'productId' => $productId]);
        } catch (\Exception $e) {
            Log::error('Error selecting product: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    public function show($id_sanpham) {
        $id = Session::get('id');
        $sanpham = DB::table('sanpham')->where('id_sanpham', $id_sanpham)->first();
        return view('sanpham.show', ['sanpham' => $sanpham,'id'=> $id]);
    }
    public function datDon(Request $request, $id_sanpham)
    {
        $id = Session::get('id');
        $sanpham = DB::table('sanpham')->where('id_sanpham', $id_sanpham)->first();
    
        $tendonhang = $sanpham->tensanpham;
        $soluong = $request->input('soluong');
        $gia = $sanpham->gia;
        $size = $request->input('size'); // Add this line to get the size from the request
    
        // Thực hiện thêm đơn hàng vào bảng donhang
        DB::table('donhang')->insert([
            'tendonhang' => $tendonhang,
            'soluong' => $soluong,
            'gia' => $gia * $soluong,
            'size' => $size, // Add the size to the insert statement
            'created_at' => now(),
            'updated_at' => now(),
            'id' => $id,
        ]);
        Session::flash('success', 'Đặt đơn hàng thành công!');
        return redirect('/giohang/' . $id_sanpham);
    }
    
}
