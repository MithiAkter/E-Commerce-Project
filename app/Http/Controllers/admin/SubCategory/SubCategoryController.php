<?php
namespace App\Http\Controllers\Admin\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubCategoryController extends Controller
{
    public function index()
    {
        $category=DB::table('categories')->get();
        $subcat=DB::table('subcategories')->join('categories','subcategories.category_id','categories.id')
        ->select('subcategories.*','categories.category_name')->get();
        return view('admin.pages.subcategory.index', compact('category','subcat'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',

        ]);
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->insert($data);
            $notification = array(
                'messege'=>'Sub-Category Inserted Successfully',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
    }
    public function DeleteSubCat($id)
    {
        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(
            'messege'=>'Sub-Category Deleted Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function EditSubCat($id)
    {
        $subcat=DB::table('subcategories')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('admin.pages.subcategory.edit_subcategory', compact('subcat','category'));
    }
    public function UpdateSubCat(Request $request,$id)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification = array(
            'messege'=>'Sub-Category Updated Successfully',
            'alert-type'=>'success'
            );
        return Redirect()->route('subcategories')->with($notification);
    }
}
