<?php

namespace App\Http\Controllers\admin;

use App\Models\WebBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebBannerController extends Controller
{
    // fetch data of banner page
    public function WebBanner()
    {
        $BannerData = WebBanner::get();
        return view('admin.banner.banner', compact('BannerData'));
    }

    // redirect to add banner page
    public function AddBanner()
    {
        return view('admin.banner.add_banner');
    }

    // Insert banner data on database
    public function InsertBanner(Request $request)
    {

        $request->validate([
            'banner_title' => 'required|unique:web_banners,banner_title',
            'banner_description' => 'required',
            'banner_image' => 'required',
        ]);

        $InsertBannerData = new WebBanner();
        $InsertBannerData->banner_title = $request->banner_title;
        $InsertBannerData->banner_description = $request->banner_description;

        if ($request->file('banner_image')) {
            $file = $request->file('banner_image');
            $filename = 'banner' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $filename);
            $InsertBannerData->banner_image = $filename;
        }
        $InsertedBannerData = $InsertBannerData->save();
        if ($InsertedBannerData) {
            return back()->with('success', 'Your Banner Inserted Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    // view banner data on modal
    public function ViewBanner(Request $request)
    {
        $ViewBannerData = WebBanner::where('id', '=', $request->viewId, 'and', 'status', 1)->get();
        return $ViewBannerData;
    }

    // view banner data on modal
    public function EditBanner(Request $request)
    {
        // dd('hello');
        $showDataOnUpdatePage = WebBanner::where('id', '=', $request->id)->get()->toArray();
        return view('admin.banner.edit_banner', compact('showDataOnUpdatePage'));
    }

    //update banner data update page
    public function updateBanner(Request $request)
    {
        $UpdateBanner = WebBanner::find($request->banner_id);
        $UpdateBanner->banner_title = $request->edit_banner_title;
        $UpdateBanner->banner_description = $request->edit_banner_description;
        if ($request->file('edit_banner_image')) {
            $file = $request->file('edit_banner_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $filename);
            $UpdateBanner->banner_image = $filename;
        }
        $UpdatedBanner = $UpdateBanner->save();
        if ($UpdatedBanner) {
            return back()->with('success', 'Your Banner Updated Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    // change banner data status on database
    public function StatusChange(Request $request)
    {
        $banner = WebBanner::find($request->user_id);
        $banner->status = $request->status;
        $bannerStatus = $banner->save();
        if ($bannerStatus) {
            return response()->json(['success' => 'Status change successfully.']);
        } else {
            return response()->json(['fail' => 'Something Went Wrong.']);
        }
    }

    // delete banner data and change status 
    public function BannerDataDelete(Request $request)
    {
        $DeletebannerData = WebBanner::where('id', $request->deleteId)->delete();

        if ($DeletebannerData) {
            return response()->json(['success' => 'Data Deleted successfully.']);
        } else {
            return response()->json(['fail' => 'Something Went Wrong.']);
        }
    }
}
