<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'year_of_birth' => 'required|integer|min:1960|max:2010',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'year_of_birth'=>$request->year_of_birth,
            'password'=>Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user,'auth_token'=>$token, 'token_type'=>'Bearer']);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        return response()->json(['message'=>'Unauthorized'],401);

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>'Hi '. $user->name. ' welcome to home ', 'access_token'=>$token, 'token_type'=>'Bearer']);
    }
    // public function logout(){
    //     auth()->user()->tokens()->delete();
    //     return['message'=>'You have logout'];
    // }

}
