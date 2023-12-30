<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    public function index()
    {
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
            $imgPath = $request->file('img')->store('slides', 'public');
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
