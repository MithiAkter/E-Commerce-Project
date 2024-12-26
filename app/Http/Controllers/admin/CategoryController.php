<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Model\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;


class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.pages.category.index2', compact('category'));
    }

    public function store(Request $request)
    {
      
        try {
            $request->validate([
                'category_name' => 'required',
            ]);
          
            $category= new Category();
            $category->category_name = $request->category_name;
            $category->save();
            Toastr::success('Product Category Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category_name' => 'required',
            ]);
            $category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->status = $request->status;
            $category->save();
            Toastr::success('Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            Toastr::success('Category Section Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}