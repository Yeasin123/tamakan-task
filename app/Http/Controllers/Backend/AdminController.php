<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Session;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    use AuthenticatesUsers;
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function adminDashboard()
    {
        return view('backend.admin_dashboard');
    }

    public function adminGet()
    {
        $admin = Admin::all();
        return $admin;
    }

    public function Update_passform()
    {
        return view('backend.auth.forgatepassword');
    }

    public function Update_pass(Request $request)
    {
      $password = Auth::guard('admin')->user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;

      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                $user=Admin::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                Auth::logout();  

                $notification = array(
                    'message' => 'Password Change Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('adminLoginForm')->with($notification);
            }
            else{
                dd('dasd');
                $notification = array(
                    'message' => 'Required information miss match',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification) ;
             }     
          }else{

         
            $notification = array(
                'message' => 'Old Password not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
          
    }

    public function adminLogout(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;

        Admin::where('id', $id)->update(['remember_token' => null]);

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('adminLoginForm');
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('backend.pages.edit-profile',compact('admin'));
    }

    public function updateProfile(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);

         Admin::find(Auth::guard('admin')->user()->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        $notification = array(
            'message' => 'Profile updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    
}
