<?php
// app/Http/Controllers/SanBongController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanBongController extends Controller
{
    public function index()
    {   $userId = session('admin_id');
        if (!$userId) {
            abort(404, 'Không tìm thấy');
        }
        // Retrieve all records from the 'sanbong' table
        $sanbongs = DB::table('sanbong')->get();

        // Pass the data to the view
        return view('sanbong.index', compact('sanbongs'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'ten_sanbong' => 'required',
            'giasan' => 'required',
            'thongtin' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
        ]);

        // Insert the validated data into the 'sanbong' table
        DB::table('sanbong')->insert($validatedData);

        // Redirect back to the index page
        return redirect('/admin/sanbong');
    }

    public function destroy($id)
    {
        // Delete a record from the 'sanbong' table based on the provided ID
        DB::table('sanbong')->where('id_sanbong', $id)->delete();

        // Redirect back to the index page
        return redirect('/admin/sanbong');
    }
}
