<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/08/2018
 * Time: 11:52 AM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
class FeedbackController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function get_feedbacks(){

        $feeds = App\Feedback::with("user:email,id")->get();
        return View("feedback/feedbacks", ["feeds" => $feeds]);
    }


    public function new_feedback(Request $request){
        if ($request->isMethod("post")){
            $email = $request->input('email');
            $feedback = $request->input('feedback');

            $user = App\User::where("email",$email);
            $user->first()->feedbacks()->create(['text' => $feedback]);
        }

        return View("feedback/feedback_form");
    }


}