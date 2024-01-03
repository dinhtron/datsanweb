<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    public function index()
    {    $userId = session('admin_id');
        if (!$userId) {
            abort(404, 'Không tìm thấy');
        }
        $slides = DB::table('slide')->get();
        return view('slides.index', compact('slides'));
    }

    public function create()
    {
        return view('slides.create');
    }
    public function store(Request $request)
    {
        $name = $request->input('name');
        $thoigianupanh = now();
    
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName(); // Lấy tên file gốc

            // Di chuyển file vào thư mục public
            $file->move(public_path('storage/slide'), $fileName);

            // Đường dẫn sau khi di chuyển
            $imgPath = 'storage/slide/' . $fileName;


        } else {
            $imgPath = null;
        }
    
        DB::table('slide')->insert([
            'name' => $name,
            'img' => $imgPath,
            'thoigianupanh' => $thoigianupanh,
        ]);
    
        return redirect()->route('slides.index')->with('success', 'Slide đã được thêm thành công.');
    }
    
    
    public function destroy($id)
    {
        DB::table('slide')->where('id', $id)->delete();
        return redirect()->route('slides.index')->with('success', 'Slide đã được xóa thành công.');
    }
}
