<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = DB::table('users')->where('email', '=', $request->email)->where('password', '=', md5($request->password));

        if(!$login->exists()) {
            return redirect('user/login')->withInput()->withErrors(['Os dados informados não conferem!']);
        }

        $user = $login->first();

        session(['user' => [
            'logged' => true,
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]]);

        return redirect(route('dashboard.index'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:4|max:255',
                'email' => 'required|unique:users,email|email:rfc',
                'password' => 'required|min:4|max:255'
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->save();

        return $this->login($request);
    }
}
