<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
    //validacion de los datos
        $request->validate([
            'name' => 'required',
            'email' => 'required|email@unique:users',
            'password' => 'required|confirmed'
        ]);

    //alta del usuario
        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user-> save();
    //respuesta

    return response($user, Response::HTTP_CREATED);

        
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

    if (Auth::attempt($credentials)){
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('cookie_token', $token, 60 * 24);
        return response(["token"=>$token], Response::HTTP_OK)->withCookie($cookie);
    }else{
        return response(Response::HTTP_UNAUTHORIZED);
    }

    }

    public function userProfile(Request $request){

    }
    public function logout(){

    }
    public function allUsers(){

    }
}
