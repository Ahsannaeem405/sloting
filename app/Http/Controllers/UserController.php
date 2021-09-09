<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asset;
use App\Models\Link;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
       public function index()
    {
        $getasset['real']=Asset::get();
        $getasset['winimg']=Link::get();
             $getasset['real1']=Link::count();
             $getasset['real2']=Asset::count();
   
        return view('index',$getasset);
    }
     public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
     public function facebook()
    {
        
        try {
        
            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->intended('dashboard');
         
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('123456dummy')
                ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('dashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
 
    public function getData(Request $request)
    {
         // $validatedData = $request->validate([
         //     'number'=>'required',
         //    'terms'=>'required',
         //    'age'=>'required',
         //    ], [
         //        'number.required' => 'number is required',
         //        'terms.required' => 'terms is required',
         //        'age.required' => 'age is required',
         //    ]);
      if( $request !=''){
        $user=new User();
        $user->number=$request->number;
        $user->terms=$request->terms;
        $user->age=$request->age;
        $user->name=rand(11111,22222);
        $user->email=rand(11111,22222).'@gmail.com';
        $user->password='naeem';
        $user->save();
      $play_id['play_id']= session()->put('PLAY_ID',1);
                  $legel_caver=Link::find(2);
          return   response()->json(['link'=>$legel_caver->link]);  
     
}
    
 }

  
        public function url_link()
        {
            session()->put('PLAY_ID',2);
            $air_time=Link::find(1);

            return redirect($air_time->link);
        }   

         public function fb_link()
        {

             session()->put('PLAY_ID',3);

            return redirect('https://www.facebook.com/sharer/sharer.php?u=https://hotal.brownetech.com/&display=popup');
        }
        public function reset()
        {

             session()->forget('PLAY_ID');

            return redirect('/');
        }


}
