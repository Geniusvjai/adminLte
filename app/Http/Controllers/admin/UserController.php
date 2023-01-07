<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\WebBanner;

class UserController extends Controller
{
    // login and redirect to dashboard if guard is true
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
    }
    
    // through get method change url to dashboard from other page
    public function dashboard()
    {
        $CategoryCount = Category::get()->count();
        $Sub_categoryCount = SubCategory::get()->count();
        $ProductCount = Product::get()->count();
        $UsersCount = User::get()->count();
        $BannerCount = WebBanner::get()->count();
        // dd($sub_categorycount);
        return view('admin.layout.main', compact('CategoryCount','Sub_categoryCount','ProductCount','UsersCount','BannerCount'));
    }

    // logout guard and redirect to login page
    public function logout()
    {
        Auth::guard('admin')->logout();
        return view('admin.login');
    }

    //this method is for fetch data in users page
    public function users()
    {
        $UserData = User::orderBy('id', 'DESC')->get();
        return view('admin.users', compact('UserData'));
    }

    //login check and go to dashboard page
    public function login_check(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        } else {
            return back()->with('fail', 'This email is not registered.');
        }

        return view('admin.layout.main');
    }

    //add user data of modal  
    public function add_users(Request $request)
    {
        return view('admin.add-user');
    }
    
    public function UpdateUsers(Request $request){
        $request->validate([
            'user_name'=>'required',
            'user_email'=>'required',
            'user_contact_number'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
                $AddUser = new User();
                $AddUser->name = $request->user_name;
                $AddUser->email = $request->user_email;
                $AddUser->number = $request->user_contact_number;
                $AddUser->password = Hash::make($request->password);
                $AddUser->remember_token = $request->_token;
                $insetedUser = $AddUser->save();
                if ($insetedUser) {
                    return back()->with('success', 'You Have Registered Successfully');
                } else {
                    return back()->with('fail', 'Something Went Wrong');
                }
        
    }

    // show data of view modal 
    public function fetch_data_view_modal(Request $request)
    {
        $viewdata = User::where('id', '=', $request->viewId)->get();
        return $viewdata;
    }

    // show data of edit modal
    public function fetch_data_edit_modal(Request $request)
    {
        $editData = User::where('id', '=', $request->editId)->get();
        return $editData;
    }

    // update data of edit modal
    public function update_data(Request $request)
    {
        $updateData = User::where('id', '=', $request->edit_id)->first();
        $updateData->name = $request->edit_name;
        $updateData->email = $request->edit_email;
        $updateData->number = $request->edit_number;
        $updatedModal = $updateData->save();
        if ($updatedModal) {
            return response()->json(array('success' => 'Your Data Has been successfully updated'));
        } else {
            return response()->json(array('fail' => 'Something Went Wrong'));
        }
    }

    // dalete data of modal
    public function delete_data(Request $request)
    {
        $deleteData = User::where('id', $request->deleteId)->delete();
        if ($deleteData) {
            return response()->json(['success' => 'User Data Deleted successfully.']);
        } else {
            return response()->json(['fail' => 'Something Went Wrong.']);
        }
    }


        // $deleteData = User::where('id', '=', $request->deleteId)->delete();
        // if ($deleteData) {
        //     return response()->json(array('success' => 'Your Data Has been successfully Deleted'));
        // } else {
        //     return response()->json(array('fail' => 'Something Went Wrong'));
        // }

    // change status on database and show on table
    public function changeUserStatus(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    
    }

}
