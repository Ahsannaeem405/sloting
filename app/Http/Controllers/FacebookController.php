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
              dd(12);

        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }
}