<?php
namespace App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use DB;
use Yoeunes\Toastr\Facades\Toastr;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.pages.category.index', compact('category'));
    }

    public function store(Request $request)
    {
      
        try {
            $request->validate([
                'category_name' => 'required',
            ]);
          
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->save();
            Toastr::success('Product Category Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function DeleteCategory($id)
    {
    	DB::table('categories')->where('id',$id)->delete();

    	$notification = array(
                        'messege'=>'Category Delete Successfully',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }
    public function EditCategory($id)
    {
    	$category = DB::table('categories')->where('id',$id)->first();
    	return view('admin.pages.category.edit_category',compact('category'));

    }

    public function UpdateCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
        'category_name' => 'required|max:50',
        ]);

        $data=array();
        $data['category_name']=$request->category_name;
    	$update = DB::table('categories')->where('id', $id)->update($data);

    	if ($update) {
    		$notification = array(
                        'messege'=>'Category successfully Update',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('categories')->with($notification);
    	}
    	else
    	{
    		$notification = array(
                        'messege'=>'Nothing to Update',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('categories')->with($notification);

    	}

    	
    }
}
