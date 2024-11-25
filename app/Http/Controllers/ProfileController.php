<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    //

    public function index(){
        return view('dashboard.profile.index');
    }

    // profile update

    public function name_update(Request $request){
        $oldname= auth()->user()->name;
        $request->validate([
            'name' => 'required|max:25',
        ]);

        User::find(auth()->id())->update([
            'name'=> $request->name,
            'updated_at'=> now(),
        ]);
        return back()->with("name_update","Name Update Successfull $oldname to $request->name");
    }

// email update

    public function email_update(Request $request){
        $oldemail= auth()->user()->email;
        $request->validate([
            'email' => 'required|max:50',
        ]);

        User::where('email', auth()->user()->email)->update([
            'email'=> $request->email,
            'updated_at'=> now(),
        ]);
        return back()->with("email_update","Email Update Successfull $oldemail to $request->email");
    }


    // password update

    public function password_update(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|min:8',
            // 'psssword_confirmation'=>'required',
        ]);

        if(Hash::check($request->current_password,auth()->user()->password)){
            User::find(auth()->user()->id)->update([
                'password'=> $request->password,
                'updated_at'=> now(),
            ]);
            return back()->with('password_update','New Password Updated Successfully!');

        }
        else{
            return back()->withErrors(['current_password'=>'Current password does not match with our record'])->withInput();
        }

    }



    // image update


    public function image_update(Request $request){
        $request->validate([
            'image'=> 'required'
        ]);
        $manager = new ImageManager(new Driver());

        $oldimage= auth()->user();
        
        if($request->image){
            $oldpath= base_path('public/uploads/profile/'.$oldimage->image);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }
        }

        if($request->hasFile('image')){
            $newname= auth()->user()->id . '-' . rand(0,99999) . '-' . now()->format('d-m-Y H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/profile/'.$newname));

            User::find(auth()->user()->id)->update([
                'image'=> $newname,
                'updated_at'=> now(),
            ]);

            return back()->with('image_update','Image Uploaded Successfully');

        }

    }

}
