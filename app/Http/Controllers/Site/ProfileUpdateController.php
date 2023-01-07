<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProfileUpdateController extends Controller
{
    public function profileView()
    {
        return view('site.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'updateName' => 'required',
            // 'updateEmail' => 'required|unique:users,email',
            'updateProfile' => 'mimes:jpeg,jpg,png|max:10000',
        ]);

        $updateSiteProfile = User::find(Auth::guard('webs')->user()->id);
        $updateSiteProfile->name = $request->updateName;
        $updateSiteProfile->email = $request->updateEmail;

        if ($request->hasFile('updateProfile')) {
            // dd('start');
            $dest = 'uploads/students/' . $updateSiteProfile->avatar;
            if (File::exists($dest)) {
                File::delete($dest);
            }
            $file = $request->file('updateProfile');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/students/', $filename);
            $updateSiteProfile->avatar = $filename;
        }
        $profileUpdated = $updateSiteProfile->save();
        if ($profileUpdated) {
            return back()->with('success', 'Your Profile Has been Successfully updated');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }
}
