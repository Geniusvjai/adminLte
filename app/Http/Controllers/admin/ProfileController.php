<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users_test;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function update_profile(Request $request){

        $updateProfile = Users_test::find(Auth::guard('admin')->user()->id);
        $updateProfile->name = $request->name;
        $updateProfile->email = $request->email;
        $updateProfile->number = $request->number;
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
        if($request->hasFile('image')){
            $destination = 'uploads/students/'.$updateProfile->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $updateProfile->image = $filename;
        }
        
        $profileUpdated = $updateProfile->save();
        if($profileUpdated){
            return back()->with('success', 'Your Profile Has been Successfully updated');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }

        // through get method change url to profile from other page
        public function profile()
        {
            return view('admin.profile');
        }

    public function update_Password(Request $request){

        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        // dd(Auth::guard('admin')->user()->id);
        $check_password = Users_test::find(Auth::guard('admin')->user()->id);
        $check_password->password = Hash::make($request->password);
        $updatePassword = $check_password->save();
        if($updatePassword){
            return back()->with('success', 'Your Password Has Been Successfully Updated');
        }else{
            return back()->with('fail', 'Password Did Not Match');
        }
    }
}
