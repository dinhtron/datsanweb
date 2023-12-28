<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        $feedbackSubmitted = session('feedbackSubmitted', false);


        return view('feedback_form', compact('feedbackSubmitted'));
    }

    public function submitFeedback(Request $request)
    {   $id = Session::get('id');
        $feedback = $request->input('feedback-input');
        $feedbackItem = DB::table('users')
        ->select('taikhoan', 'email')
        ->where('id_user', $id)
        ->first();
        $email = $feedbackItem->email;
        $taikhoan=$feedbackItem->taikhoan;
        // Perform necessary actions with feedback (e.g., save to the database)
        DB::table('phanhoi')->insert(['taikhoan'=>$taikhoan,'email'=>$email,'thongtin_phanhoi' => $feedback]);

        // Mark that feedback has been submitted
        $request->session()->flash('feedbackSubmitted', true);

        // Redirect the user to the feedback page
        return redirect()->route('feedback.form');
    
    }
}
