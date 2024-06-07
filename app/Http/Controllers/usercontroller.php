<?php

namespace App\Http\Controllers;

use App\models\user;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class usercontroller extends Controller
{
  public function login(Request $request){
    $incomingfields = $request->validate ([
      'loginname' =>  'required',
      'loginpassword' => 'required'
    ]);
    if(auth()-> attempt(['name' => $incomingfields['loginname'],'password' => $incomingfields['loginpassword']])) {
     $request->session()->regenerate();
    }
    return redirect('/');
  }
   public function logout() {
    auth()->Logout();
    return redirect('/');
   }
  public function register(request $request) {
    $incomingfields = $request->validate([
     'name' => ['required', 'min:3','max:200', rule::unique('users', 'name')],
     'email' => 'required', Rule::unique('users','email'),
     'password' => ['required','min:8', 'max:200']
    ]);
    $incomingfields['password'] = bcrypt($incomingfields['password']);
    $user = user::create($incomingfields);
    auth()->login($user);
    return redirect('/');
  }
}
