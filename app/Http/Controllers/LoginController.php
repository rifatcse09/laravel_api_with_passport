<?php

/**
 * @ Author: MD Rifatul Islam
 * @ Create Time: 2020-11-16 10:13:37
 * @ Modified by: Your name
 * @ Modified time: 2020-12-08 15:38:43
 * @ Description:
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            // $request->validate([
            //     'email' => ['requred', 'email'],
            //     'email' => ['requred']
            // ]);

            $validatedData = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                //throw ValidationException::withMessages([
                  //  'email' => 'The provided email is incorrect'
               // ]);
                throw new HttpResponseException(response()->json('Invalid User', 201));
            }
            
            return response()->json( $user->createToken('Auth Token')->accessToken, 201);
        // return response()->success( $user->createToken('Auth Token')->accessToken, trans('messages.success_message'), Response::HTTP_OK);
            //return $user->createToken('Auth Token')->accessToken;
        } catch (Exception $e) {
                     ////return error message
            return response()->json(["message" => "Internal server error"], 500);
        }
    }
}
