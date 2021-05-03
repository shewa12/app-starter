<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class DashboardController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $title= "Dashboard";
        return view('dashboard.index')->with([
            'title'=>$title
        ]);
    }

    function myProfile()
    {
        $title="My Profile";
        return view('dashboard.my_profile')->with([
            'title'=>$title
        ]);        
    }

    function updateAvatar(Request $request)
    {

        $request->validate([
            'image' =>'required|image|mimes:jpeg,png,jpg|max:1000'
        ]);


        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();

        $post= [
            'image'=>$imageName,
        ];
        $q= User::where('id',Auth::id())->update($post);
                    
        if($q){
            $image->move('storage/app/avatars/',$imageName);
            return redirect()->back()->with('success',"Profile photo udpated.");
        }
        else{
            return redirect()->back()->with('fail',"Profile photo udpate failed.");
        }
    } 

    function updatePassword()
    {
        $title="Update Password";
        return view('dashboard.update_password')->with([
            'title'=>$title
        ]);        
    }       

    function passwordReset(Request $request)
    {
        $this->validate($request, [
           'old_password' => 'required',
           'password' => 'required|min:6|confirmed',
           
            ]);
        $newpassword= $request->password;

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $update= User::where('id',Auth::id())
                            ->update(['password'=>bcrypt($newpassword)]);  
            return redirect()->back()->with('success',"Password Changed!");

            }              

        else{
               return redirect()->back()->with('fail',"Old password not matched!");
        }        
    }
}
