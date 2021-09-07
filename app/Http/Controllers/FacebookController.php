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
    public function handleFacebookCallback(Request $request)
    {
        // dd($request->input());
               //dd('1');

        try {
        
            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();

            if($finduser){
       //dd('2');
                Auth::login($finduser);
        
                return redirect()->intended('dashboard');
            }else{
                       //dd('3');

                return response()->json(['url'=>$finduser]);
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
        
                Auth::login($newUser);
                       //dd('4');

                return redirect()->intended('dashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}