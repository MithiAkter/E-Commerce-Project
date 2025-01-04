<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
        // return response()->json($product);
        return view ('admin.product.index',compact('product'));
    }
    public function create(){
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        return view('admin.product.create',compact('category','brand'));
    }
    //subcattegory collected by ajax request
    public function GetSubcat($category_id){
        $cat=DB::table("subcategories")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }
    public function store(Request $request){

        // dd($request->all());
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_price']=$request->selling_price;
        $data['product_details']=$request->product_details;
        $data['video_link']=$request->video_link;
        $data['main_slider']=$request->main_slider;

        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['mid_slider']=$request->mid_slider;
        $data['hot_new']=$request->hot_new;
        $data['status']=1;

        // return response()->json($data);
        // $image_one=$request->file('image_one');
        // $image_two=$request->file('image_two');
        // $image_three=$request->file('image_three');
    //     if($image_one){
    //         $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    //         Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
    //         $data['image_one']='public/media/product/'.$image_one_name;
    //         $product=DB::table('products')->insert($data);
    //         $notification=array(
    //             'message'=>'Product Inserted Successfully',
    //             'alert-type'=>'success'
    //         );
    //         return Redirect()->back()->with($notification);
    // }elseif($image_one && $image_two){
    //     $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    //     Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
    //     $data['image_one']='public/media/product/'.$image_one_name;
    //     $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    //     Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
    //     $data['image_two']='public/media/product/'.$image_two_name;
    //     $product=DB::table('products')->insert($data);
    //         $notification=array(
    //             'message'=>'Product Inserted Successfully',
    //             'alert-type'=>'success'
    //         );
    //    }

        if ($request->hasFile('image_one')) {
            $image_one = $request->file('image_one');

            $filename = time() . "_Products1." . $image_one->getClientOriginalExtension();
            $path = 'public/media/product';
            $image_one->move(public_path($path), $filename);
            $fullPath = $path . '/' . $filename;
            $data['image_one'] = $fullPath;
        } 

        if ($request->hasFile('image_two')) {
            $image_two = $request->file('image_two');
    
            $filename = time() . "_Products2." . $image_two->getClientOriginalExtension();
            $path = 'public/media/product';
            $image_two->move(public_path($path), $filename); 
            $fullPath = $path . '/' . $filename;
            $data['image_two'] = $fullPath;
        }

        if ($request->hasFile('image_three')) {
            $image_three = $request->file('image_three');
    
            $filename = time() . "_Products3." . $image_three->getClientOriginalExtension();
            $path = 'public/media/product';
            $image_three->move(public_path($path), $filename); 
            $fullPath = $path . '/' . $filename;
            $data['image_three'] = $fullPath;
        }
        $product=DB::table('products')->insert($data);
        $notification = array(
            'messege'=>'Brand Inserted Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
   
    }

    public function Inactive($id){
        DB::table('products')->where('id',$id)->update(['status'=> 0]);
        $notification=array(
                'message'=>'Product Inactive Successfully',
                'alert-type'=>'success'
            );
           return Redirect()->back()->with($notification);
    }
    public function Active($id){
        DB::table('products')->where('id',$id)->update(['status'=> 1]);
            $notification=array(
                'message'=>'Product Active Successfully',
                'alert-type'=>'success'
            );
           return Redirect()->back()->with($notification);
    }
    public function DeleteProduct($id){
        $product=DB::table('products')->where('id',$id)->first();
        $image1=$product->image_one;
        $image2=$product->image_two;
        $image3=$product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        DB::table('products')->where('id',$id)->delete();
        $notification=array(
            'message'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function ViewProduct($id){
        $product=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('brands','products.brand_id','brands.id')
                ->join('subcategories','products.subcategory_id','subcategories.id')
                ->select('products.*','categories.category_name','brands.brand_name',
                    'subcategories.subcategory_name')
                ->where('products.id',$id)
                ->first();
        // return response()->json($product);
        return view ('admin.product.show_product',compact('product'));

    }
    public function EditProduct($id){
        $product=DB::table('products')->where('id',$id)->first();
        // return response()->json($product);;
        return view('admin.product.edit_product',compact('product'));
    }
    
    public function UpdateProduct(Request $request,$id){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['discount_price']=$request->discount_price;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_price']=$request->selling_price;
        $data['product_details']=$request->product_details;
        $data['video_link']=$request->video_link;
        $data['main_slider']=$request->main_slider;

        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['mid_slider']=$request->mid_slider;
        $data['hot_new']=$request->hot_new;

        $update=DB::table('products')->where('id',$id)->update($data);
        
        if($update){
            $notification=array(
                'message'=>'Product Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }else{
            $notification=array(
                'message'=>'Nothing to Update',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }

        // return response()->json($data);
        // $image_one=$request->file('image_one');
        // $image_two=$request->file('image_two');
        // $image_three=$request->file('image_three');
    }

}
