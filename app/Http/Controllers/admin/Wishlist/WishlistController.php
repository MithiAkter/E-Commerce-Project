<?php

namespace App\Http\Controllers\admin\Wishlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function AddWishlist($id)
    {
            $userid = Auth::id();
            $check=DB ::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();
            $data = array(
                'user_id'=>$userid,
                'product_id'=>$id
            );
            if($check){
                $notification = array(
                    'messege'=>'Product Already Added in Wishlist',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            
        }else{
            
            DB::table('wishlists')->insert($data);
            $notification = array(
                'messege'=>'Add to wishlist Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
