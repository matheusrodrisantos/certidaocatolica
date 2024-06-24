<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Traits\HttpResponses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    use HttpResponses;


    public function csrfCookie(Request $request)
    {
        return $request->session()->regenerateToken();
    }
    public function register(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|max:255|unique:users',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {


            return $this->error(
                'Data invalid',422,$validator->errors()
            );
            

        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'data'          => $user,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }



    public function login(Request $request)
    {
        

        $validator= Validator::make($request->all(),[
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
        ]);


        if ($validator->fails()) 
        {
            $errors = implode(' ', $validator->errors()->all());
            return $this->error(
                $errors,400,$validator->errors()
            );
        }

        $credentials    =   $request->only('email', 'password');
                
        if (! Auth::attempt($credentials)) 
        {
            return $this->error(
                'Usuario nao encontrado',422
            );

        }

        $user   = User::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token',['*'],now()->addWeek())->plainTextToken;


        return $this->response(
            'Login sucess', 200,
            ['access_token'  => $token,
                   'token_type'    => 'Bearer',
                   'paroquia_id'=>$user->paroquia_id
                  ]
            );

    }

    public function logout(){

    }
}
