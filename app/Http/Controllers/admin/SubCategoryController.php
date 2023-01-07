<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class SubCategoryController extends Controller
{

    // redirect to sub category page and show all data of sub category 
    function index()
    {
        $data = SubCategory::with('Category')->orderby('id', 'DESC')->get()->toArray();
        return view('admin.sub-category.subcategory', compact('data'));
    }

    // Redirect To Add Sub Category with category data 
    public function AddSubCategory()
    {
        $categories = Category::all();
        return view('admin.sub-category.add_sub_category', ['categories' => $categories]);
    }

    // Add Sub Category 
    public function AddSubCat(Request $request)
    {
        $categoryId = $request['category_id'];
        $request->validate([
            'sub_category_name' => Rule::unique('sub_categories')->where(function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            }),
        ]);

        $insertCategory = new SubCategory();
        $insertCategory->category_id = $request->category_id;
        $insertCategory->sub_category_name = $request->sub_category_name;
        $insertCategory->sub_category_slug = Str::slug($request->sub_category_name);
        $insertedCategory  = $insertCategory->save();
        if ($insertedCategory) {
            return back()->with('success', 'Sub Category Inserted Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    // View Sub Category 
    public function ViewSubCategory(Request $request)
    {
        $cateid = SubCategory::with('Category')->where('id', '=', $request->viewId)->get()->toArray();
        return $cateid;
    }

    // show edit page sub category data
    public function editSubCategory(Request $request)
    {
        $editSubCategoryData = SubCategory::with('Category')->where('id', '=', $request->id)->get()->toArray();
        return view('admin.sub-category.edit_sub_category', compact('editSubCategoryData'));
    }

    // update sub category on edit page
    public function updateSubCategory(Request $request)
    {
        $request->validate([
            'edit_sub_category_name' => 'required|unique:sub_categories,sub_category_slug',
        ]);
        $UpdateSubCategory = SubCategory::find($request->sub_category_id);
        $UpdateSubCategory->sub_category_name = $request->edit_sub_category_name;
        $UpdateSubCategory->sub_category_slug = Str::slug($request->edit_sub_category_name);
        $UpdateComplete = $UpdateSubCategory->save();
        if ($UpdateComplete) {
            return back()->with('success', 'Sub Category Updated Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    //delete sub category from category page
    public function deleteSubCategory(Request $request)
    {
        $DeleteSubCategory = SubCategory::where('id', $request->deleteId)->delete();

        if ($DeleteSubCategory) {
            return response()->json(['success' => 'Sub Category Deleted Successfully']);
        } else {
            return response()->json(['fail'=> 'Something Went Wrong When Deleting']);
        }
    }

    //change status in sub category 
    public function ChangeSubCategoryStatus(Request $request)
    {
        $user = SubCategory::find($request->user_id);
        $user->status = $request->status;
        $ChangeStatus = $user->save();
        if ($ChangeStatus) {
            return response()->json(['success' => 'Status change successfully.']);
        } else {
            return response()->json(['success' => 'Something Went Wrong.']);
        }
    }
}
