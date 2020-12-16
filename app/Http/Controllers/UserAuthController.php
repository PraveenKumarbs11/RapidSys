<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use Socialite;
use Str;

class UserAuthController extends Controller
{
    public function login(){
    	return view('auth.login');
    }
    public function register(){
    	return view('auth.register');
    }
    public function forgotPassword(){
    	return view('auth.forgotPassword');
    }
    public function create(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'mail' => 'required|email|unique:users',
    		'password' => 'required|min:8|max:13'
    	]);
    	/*$user = new User;
    	$user->name = $request->name;
    	$user->mail = $request->mail;
    	$user->password = Hash::make($request->password);
    	$query = $user->save();*/
        //Trying with query builder
        $query = DB::table('users')
                    ->insert([
                        'name'=>$request->name,
                        'mail'=>$request->mail,
                        'password'=>Hash::make($request->password)
                    ]);

    	if($query){
    		return back()->with('success', 'You have been registered successfully');
    	}else{
    		return back()->with('fail', 'Something went wrong!');
    	}
    }
    public function check(Request $request){
    	$request->validate([
    		'mail' => 'required|email',
    		'password' => 'required|min:8|max:13'
    	]);
    	//$query = User::where('mail', '=', $request->mail)->first();
        //Trying with query builder
        $query = DB::table('users')->where('mail', $request->mail)->first();
    	if($query){
    		if(Hash::check($request->password, $query->password)){
    			$request->session()->put('LoggedUser', $query->id);
    			return redirect('profile');
    		}else{
    			return back()->with('fail', 'Incorrect password!');
    		}
    	}else{
    		return back()->with('fail', 'No account found for the email');
    	}
    }
    public function github(){
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect(){
        $user = Socialite::driver('github')->user();
        //dd($user);
        $username = $user->name;
        $usermail = $user->email;
        $now = new DateTime();
        $query = DB::table('users')->insert([
                        'name'=>$username,
                        'mail'=>$usermail,
                        'password'=>Hash::make($username),
                        'created_at'=> $now->getTimestamp()
                    ]);
        $query2 = DB::table('users')->where('mail', $usermail)->first();
        session()->put('LoggedUser', $query2->id);
        return redirect('profile');
    }
    public function google(){
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect(){
        $user = Socialite::driver('google')->user();
        //dd($user);
        $username = $user->name;
        $usermail = $user->email;
        $query = DB::table('users')->insert([
                        'name'=>$username,
                        'mail'=>$usermail,
                        'password'=>Hash::make($username),
                        'created_at'=> $now->getTimestamp()
                    ]);
        $query2 = DB::table('users')->where('mail', $usermail)->first();
        session()->put('LoggedUser', $query2->id);
        return redirect('profile');
    }
    public function profile(){
    	if(session()->has('LoggedUser')){
    		//$user = User::where('id', '=', session('LoggedUser'))->first();
            //Trying with query builder
            $user = DB::table('users')->where('id', session('LoggedUser'))->first(); 
    		$data = [
    			"LoggedUserInfo" => $user
    		];
    	}
        return view('admin.profile', $data);
        //return header('Location:','$_SERVER['SERVER_NAME']....profile');
    	//return redirect('profile')->with('LoggedUserInfo', $data);
    }
    public function logout(){
    	if(session()->has('LoggedUser')){
    		session()->pull('LoggedUser');
    		return redirect('login');
    	}
    }
}
