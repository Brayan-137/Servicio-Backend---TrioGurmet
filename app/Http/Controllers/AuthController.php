<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\Employee;
use App\Models\Client;
use \stdClass;

class AuthController extends Controller
{
    public function login(Request $request) {
        if (!$request->hasHeader('Authorization') || !$request->hasHeader('User-Type')) {
            return response()->json(['message' => 'Unauthorized: Missing headers'], 401);
        }

        $user = null;
        $userType = $request->header('User-Type');

        if ($userType === 'employee') {
            $user = Employee::where('email', $request->getUser())->first();
        } elseif ($userType === 'client') {
            $user = Client::where('email', $request->getUser())->first();
        }

        if (!$user || $user->password != $request->getPassword()) {
            return response()->json(['message'=>'Unauthorized. Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token', [$userType])->plainTextToken;

        return response()->json([
            'message' => 'Authorized: '.$user->name,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'user_type' => $userType,
        ]);
    }

    public function logout () {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'You have successfully logget out and the token was successfully delete'
        ]);
    }
}
