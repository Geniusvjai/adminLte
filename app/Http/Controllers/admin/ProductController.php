<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // show all product data on product table
    function product()
    {
        $Productdata = Product::with('SubCategory', 'Category')->orderby('id', 'DESC')->get()->toArray();
        $ImageShow = Product::get();
        // dd($Productdata);  
        return view('admin.product.product', compact('Productdata'));
    }

    // change status of product 
    public function changeProductStatus(Request $request)
    {
        $user = Product::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    // get sub category name on category name select in product page 
    public function SubCatData(Request $request)
    {
        $matchId = SubCategory::where('category_id', '=', $request->cate_id)->get();
        $fetchSubcateData = [];
        foreach ($matchId as $ids) {
            $fetchSubcateData[] = "<option value=' $ids[id]'> $ids[sub_category_name]</option>";
        }
        return $fetchSubcateData;
    }

    // redirect to add product page 
    public function AddProduct()
    {
        $FetchCategory = Category::get()->toArray();
        return view('admin.product.add_product', compact('FetchCategory'));
    }

    // insert product data in add product page 
    public function InsertProduct(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'sub_category_name' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'product_title' => 'required|unique:products,title',
            'product_description' => 'required',
            'product_long_description' => 'required',
            'product_regular_price' => 'required',
            'product_sale_price' => 'required',
            'product_image' => 'required',
            'product_gallary_image' => 'required',
        ]);
        $AddProduct = new Product();
        $AddProduct->category_id = $request->category_name;
        $AddProduct->sub_category_id = $request->sub_category_name;
        $AddProduct->title = $request->product_title;
        $AddProduct->product_size = $request->product_size;
        $AddProduct->product_color = $request->product_color;
        $AddProduct->description = $request->product_description;
        $AddProduct->long_description = $request->product_long_description;
        $AddProduct->regular_price = $request->product_regular_price;
        $AddProduct->sale_price = $request->product_sale_price;
        if ($request->file('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/addProduct'), $filename);
            $AddProduct->image = $filename;
        }

        if ($galaryFiles = $request->file('product_gallary_image')) {
            foreach ($galaryFiles as $galaryFile) {
                $filenames = time(). '.' .$galaryFile->getClientOriginalExtension();
                $galaryFile->move(public_path('uploads/addGallaryProduct'), $filenames);
                $image[] = $filenames;
                $AddProduct->product_gallary_image = implode(',', $image);
            }
        }

        $insertedProduct = $AddProduct->save();
        if ($insertedProduct) {
            return back()->with('success', 'Your Product Inserted Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    // show data on view modal 
    public function productDataVIew(Request $request)
    {
        $viewProductData = Product::where('id', '=', $request->viewId)->with('SubCategory', 'Category')->get();
        return $viewProductData;
    }

    // show edit product data page   
    public function productDataEdit(Request $request)
    {
        $editProductData = Product::with('Category', 'SubCategory')->where('id', '=', $request->id)->get();
        // dd($editProductData);
        return view('admin.product.edit_product', compact('editProductData'));
    }

    // update product data 
    public function productDataUpdate(Request $request)
    {

        $request->validate([
            'edit_product_image' => 'mimes:jpg,jpeg,png',
            // 'edit_product_gallary_image' => 'mimes:jpg,jpeg,png',
        ]);

        $UpdateProduct = Product::find($request->product_id);
        $UpdateProduct->category_id = $request->edit_category_name;
        $UpdateProduct->sub_category_id = $request->edit_sub_category_name;
        $UpdateProduct->title = $request->edit_product_title;
        $UpdateProduct->description = $request->edit_product_description;
        $UpdateProduct->long_description = $request->edit_product_long_description;
        $UpdateProduct->regular_price = $request->edit_product_regular_price;
        $UpdateProduct->sale_price = $request->edit_product_sale_price;

        if ($request->hasFile('edit_product_image')) {
            $destination = 'uploads/addProduct/' . $UpdateProduct->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('edit_product_image');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('uploads/addProduct'), $filename);
            $UpdateProduct->image = $filename;
        }

        if ($request->hasFile('edit_product_gallary_image')) {
            if ($ProductGallaries = $request->file('edit_product_gallary_image')) {
                foreach ($ProductGallaries as $ProductGallary) {
                    $filenames = time() . $ProductGallary->getClientOriginalName();
                    $ProductGallary->move(public_path('uploads/addGallaryProduct'), $filenames);
                    $image[] = $filenames;
                    $UpdateProduct->product_gallary_image = implode(',', $image);
                }
            }
        }

        $UpdatedProductData = $UpdateProduct->save();
        if ($UpdatedProductData) {
            return back()->with('success', 'Your Product Has been Successfully updated');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    public function productGallaryImages(Request $request){
        $matchId = Product::where('id', '=', $request->gallaryId)->get();
        // dd($matchId[0]['product_gallary_image']);
        $fetchGallaryData = [];
        $allImages = explode(',', $matchId[0]['product_gallary_image']);
        foreach ($allImages as $ids) {
            $fetchGallaryData[] = "<img src='http://127.0.0.1:8000/uploads/addGallaryProduct/$ids'  style='width:150px;margin:15px;height:100px' >";
        }
        return $fetchGallaryData;
    }

    // Product Data Delete from dashboard and change status of product
    public function DeleteProductData(Request $request)
    {
        $DeleteProduct = Category::where('id', '=', $request->deleteId)->delete();
        if ($DeleteProduct) {
            return response()->json(['success' => 'Product Data Deleted Successfully.']);
        } else {
            return response()->json(['fail' => 'Something Went Wrong When Deleting.']);
        }
    }
}
