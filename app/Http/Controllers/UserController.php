<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParamsRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function params()
    {
        return view('user.params');
    }
    public function paramsUpdate(ParamsRequest $request)
    {
        $user = auth()->user();
        if($request->name){
            $user->name = $request->name;
        }
        if($request->email && $user->email != $request->email){
            $user->email = $request->email;
            $user->email_verified_at = null;
        }

        if($request->passwords) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        session()->flash('success', 'Your info has been updated successfully');

        return redirect()->route('home');

    }
}
