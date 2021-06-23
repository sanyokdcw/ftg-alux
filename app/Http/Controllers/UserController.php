<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use App;
class UserController extends Controller
{
    public function password_change(Request $request) {
        if(session()->has('locale')) {
    
            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        if($request->password == $request->password_again){
            $user = User::find(Auth::user()->id);
            $user->update(['password'=> Hash::make($request->password)]);
            return redirect('/logout');
        }
        return redirect('/office')->with(['password' => 'password']);

    }
}
