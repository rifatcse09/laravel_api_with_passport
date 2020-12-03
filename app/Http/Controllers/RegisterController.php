<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;



class RegisterController extends Controller
{
   // use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);

        
    // }

    public function register(Request $request)
    {

       // dd('sdf');
        //$this->validator($request->all())->validate();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        //$this->guard()->login($user);
        $success['token'] = $user->createToken('Auth Token')->accessToken;
        $success['user'] = $user;        
        return response()->json($success, 201);
    }
}
