<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $post = DB::table('posts')->join('post_category','posts.category_id','post_category.id')
        ->select('posts.*','post_category.category_name_en')->get();
        // return response()->json($category);
        return view('admin.pages.blog.index',compact('post'));
    }
    public function create()
    {
        $category = DB::table('post_category')->get();
        // return response()->json($category);
        return view('admin.pages.blog.create',compact('category'));
    }

    public function store(Request $request){
        $data=array();
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['category_id']=$request->category_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;

        // return response()->json($data);

        if ($request->hasFile('post_image')) {
            $post_image = $request->file('post_image');

            $filename = time() . "_Post1." . $post_image->getClientOriginalExtension();
            $path = 'public/media/post';
            $post_image->move(public_path($path), $filename);
            $fullPath = $path . '/' . $filename;
            $data['post_image'] = $fullPath;
            DB::table('posts')->insert($data);
            $notification = array(
                'messege'=>'Post Inserted Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }else{
        DB::table('posts')->insert($data);
        $notification = array(
            'messege'=>'Post Inserted Successfully',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }
    }
    public function DeletePost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        unlink($image);
        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
            'message'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function EditPost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        return view('admin.pages.blog.edit',compact('post'));
    }
    public function UpdatePost(Request $request,$id){
        $oldimage=$request->old_image;
        
        $data=array();

        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['category_id']=$request->category_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;

        $post_image=$request->file('post_image');

        if($post_image){
            unlink($oldimage);
            $filename = time() . "_Post1." . $post_image->getClientOriginalExtension();
            $path = 'public/media/post';
            $post_image->move(public_path($path), $filename);
            $fullPath = $path . '/' . $filename;
            $data['post_image'] = $fullPath;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Post Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);
            
        }else{
            $data['post_image']=$oldimage;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'Post Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.blogpost')->with($notification);
        }
    }
}
