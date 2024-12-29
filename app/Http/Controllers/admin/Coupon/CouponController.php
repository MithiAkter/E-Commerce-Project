<?php

namespace App\Http\Controllers\Admin\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Coupon;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class CouponController extends Controller
{
    public function index(){
        $coupon=DB::table('coupons')->get();
        return view('admin.coupon.index',compact('coupon'));
    }
    public function store(Request $request){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        DB::table('coupons')->insert($data);
                    $notification = array(
                        'messege'=>'Coupon successfully Inserted',
                        'alert-type'=>'success'
                        );
        return Redirect()->back()->with($notification);
    }
    public function DeleteCoupon($id){
        DB::table('coupons')->where('id',$id)->delete();
        $notification = array(
            'messege'=>'Coupon successfully Deleted',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function EditCoupon($id){
        $coupon= DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));

    }
    public function UpdateCoupon(Request $request, $id){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        DB::table('coupons')->where('id',$id)->update($data);
                $notification = array(
                    'messege'=>'Coupon Updated Successfully',
                    'alert-type'=>'success'
                );
        return Redirect()->route('admin.coupon')->with($notification);

    }
    public function Newsletter(){
        $sub=DB::table('newsletters')->get();
        return view('admin.coupon.newsletter',compact('sub'));
    }
    public function DeleteSub($id){
        DB::table('newsletters')->where('id',$id)->delete();
        $notification = array(
            'messege'=>'Subscriber successfully Deleted',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
