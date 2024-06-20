<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $req)
    {
        try{
            $validator = Validator::make($req->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
    
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ],401);
            }
    
            $user = User::create([
                'name' => $req -> name,
                'email' => $req -> email,
                'password' => $req -> password,
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken('API TOKEN')-> plainTextToken
            ],200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ],500);
        }
    }

    public function login(Request $req)
    {
        try
        {
            $validator = Validator::make($req->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ],401);
            }
            
            if(!Auth::attempt($req->only(['email','password'])))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & password does not match with our record.'
                ],401);
            }

            $user = User::where('email',$req->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'User Logged In successfully',
                'token' => $user->createToken('API TOKEN')->plainTextToken
            ],200);


        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ],500);
        }
    }

    public function profile(){
        $userData = auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'Profile Infomation',
            'data' => $userData,
            'id' => auth()->user()->id
        ],200);
    }

    public function logout(Request $req){
        $req->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => []
        ],200);
    }
}
