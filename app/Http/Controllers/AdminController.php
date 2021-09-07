<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asset;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Storage;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
     public function index()
    {
        return view('admin.index');
    }
    public function users()
    {
   
        $user['user']=User::all();
        return view('admin.users',$user);
    }


        public function usersDelete(Request $request ,$id)
    {
        $model=User::find($id);
        $model->delete();

        $request->session()->flash('message','Users Deleted Successfully');
        return redirect('admin/users');
    }
           public function assets()
    {
        $getasset['asset']=Asset::get();

        return view('admin.assets',$getasset);
    }
           public function addAssets(Request $request)
    {
             $validatedData = $request->validate([
             'title'=>'required',
            'image'=>'required',
            ], [
                'title.required' => 'Title is required',
                'image.required' => 'Image is required',
            ]);
                $model=new Asset();
                $model->title=$request->title;
             
                 $image=$request->file('image');
                $imageName = $image->getClientOriginalName();
                $model->image=$imageName;
                //  $ext=64;
                // $image_name=$image.'-'.$ext;
                $path=$image->move(public_path('admin_asset/images/asset'),$imageName);
                $model->save();
            $request->session()->flash('message','Assets Added Successfully');

                return redirect('admin/assets');

    }
    public function assetUpdate(Request $request,$id)
    {
             $validatedData = $request->validate([
             'title'=>'required',
            'image'=>'required',
            ], [
                'title.required' => 'Title is required',
                'image.required' => 'Image is required',
            ]);
                $model=Asset::find($id);
                $model->title=$request->title;
             
                 $image=$request->file('image');
                $imageName = $image->getClientOriginalName();
                $model->image=$imageName;
                //  $ext=64;
                // $image_name=$image.'-'.$ext;
                $path=$image->move(public_path('admin_asset/images/asset'),$imageName);
                $model->save();
            $request->session()->flash('message','Assets Update Successfully');

                return redirect('admin/assets');

    }
         public function assetDelete(Request $request ,$id)
    {
        $model=Asset::find($id);
        $model->delete();

        $request->session()->flash('message','Assets Deleted Successfully');
        return redirect('admin/assets');
    }
             public function links(Request $request)
             {
                $link['links']=Link::get();
                return view('admin.links',$link);
             }    

             public function linkUpdate(Request $request,$id)
    {
        // dd($request->input());
                $model=Link::find($id);
                $model->name=$request->name;
                $model->link=$request->link;            
                $model->save();
            $request->session()->flash('message','Link Update Successfully');

                return redirect('admin/links');

    }
             public function Profile(Request $request)
             {
                             return view('admin.updateProfile');

             }
             public function updateProfile(Request $request)
             {
                
                  $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
               
        ]);
        

      //  dd($request->input());
         $user = User::find(Auth::user()->id);
            $user->update([
            'name' => $request->Name,
            'email' => $request->email,
        ]);
        if(Hash::check($request->c_password,$user->password)) {     
                $user->update([
            'password' => Hash::make($request->new_password),
        ]);
                    $msg="Your profile has been updated";
                    $request->session()->flash('message',$msg);
                     return view('admin.updateProfile');
        }else{

            $msg= "Your Password does't match";
             $request->session()->flash('error',$msg);
            return view('admin.updateProfile');
        }
    }

             public function test(Request $request)
             {
                dd('ss');
             }

             

}
