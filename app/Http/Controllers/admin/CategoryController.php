<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    // Show Category data and redirect to category page
    public function CategoryMethod()
    {
        $CategoryData = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.category', compact('CategoryData'));
    }

    // Redirect To Add Category 
    public function AddCategory()
    {
        return view('admin.categories.add_category');
    }

    // Add Category 
    public function AddCat(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_slug',
        ]);

        $insertCategory = new Category();
        $insertCategory->category_name = $request->category_name;
        $insertCategory->category_slug = Str::slug($request->category_name);
        $insertedCategory  = $insertCategory->save();
        if ($insertedCategory) {
            return back()->with('success', 'Category Inserted Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    // View Category 
    public function ViewCategory(Request $request)
    {
        $viewCategoryData = Category::where('id', '=', $request->viewId)->get();
        return $viewCategoryData;
    }

    // show edit page category data
    public function editCategory($id)
    {
        $editCategoryData = Category::find($id);
        return view('admin.categories.edit_category', compact('editCategoryData'));
    }

    // update category on edit page
    public function updateCategory(Request $request, $id)
    {

        $request->validate([
            'category_name' => 'required|unique:categories,category_slug',
        ]);

        $UpdateCategory = Category::find($id);
        $UpdateCategory->category_name = $request->category_name;
        $UpdateCategory->category_slug = Str::slug($request->category_name);
        $UpdateComplete = $UpdateCategory->update();
        if ($UpdateComplete) {
            return back()->with('success', 'Category Updated Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    //delete category from category page
    public function deleteCategory(Request $request)
    {
        $DeleteCategory = Category::where('id', $request->deleteId)->delete();
        if ($DeleteCategory) {
            return response()->json(['success' => 'Data Deleted successfully.']);
        } else {
            return response()->json(['fail' => 'Something Went Wrong.']);
        }
    }

    public function ChangeCategoryStatus(Request $request)
    {
        $user = Category::find($request->user_id);
        $user->status = $request->status;
        $ChangeStatus = $user->save();
        if ($ChangeStatus) {
            return response()->json(['success' => 'Status change successfully.']);
        } else {
            return response()->json(['fail' => 'Something Went Wrong.']);
        }
    }
}
