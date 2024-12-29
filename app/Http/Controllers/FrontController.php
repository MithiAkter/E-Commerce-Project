<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class FrontController extends Controller
{
    public function index()
    {
    return view('homepage.index');
    }

    public function StoreNewsletter(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:newsletters|max:50',
            ]);
        $data=array();
        $data['email']=$request->email;
        DB::table('newsletters')->insert($data);
        // $notification = array(
        //     'messege'=>'Thanks for Subscribing',
        //     'alert-type'=>'success'
        //      );
        // return Redirect()->back()->with($notification);
        Toastr::success('Thanks for Subscribing', 'Success');
            return redirect()->back();
    }
}
