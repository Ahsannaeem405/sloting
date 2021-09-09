<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
    
class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook(Request $request)
    {
      //   $user=new User();
      //   $user->number=$request->number;
      //   $user->terms=$request->terms;
      //   $user->age=$request->age;
      //   $user->name=rand(111,222);
      //   $user->email=rand(111,222).'@gmail.com';
      //   $user->password='naeem';
      //   $user->save();
      // $play_id['play_id']= session()->put('PLAY_ID',1);
      // return view('/index',$play_id);
        return Socialite::driver('facebook')->redirect();

    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function handleFacebookCallback()
    {



      try {
        
            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
                                  dd('yes');

                return redirect()->intended('dashboard');
         
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('123456dummy')
                ]);
                  dd($newUser);
                Auth::login($newUser);
        
                return redirect()->intended('dashboard');
            }
        
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
}