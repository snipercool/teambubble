<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\IgnitionContracts\HasSolutionsForThrowable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($id)
    {   
        $user = User::find($id);
        return view('user')->with('user', $user);
        
    }

    public function updateuser(Request $request)
    {
        $user = User::where('id', Auth::user()->id);
        if (request('name') != null) {
            $user->update(['name' => request('name')]);
        }
        if (request('email') != null) {
            $user->update(['email' => request('email')]);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('uploads', Auth::user()->id.'/'.$avatar, '');
            $user->update(['avatar' => '/storage/uploads/'.Auth::user()->id.'/'.$avatar]);
        }
        if (request('password') != null) {
            if ($request->get('current-password') == $request->get('new-password')) {
                //Current password and new password are same
                return redirect()->back()->with('SameError', 'Error!');
            }
            if (request('password-confirm') != null) {
                if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                    // The passwords matches
                    return redirect()->back()->with('CurrentError', 'Error!');
                }
                $password = Hash::make(request('password'));
                $user->update(['password' => $password]);
            }
        }
        return redirect()->back()->with('updateSuccess', 'Sucess');
    }
}
