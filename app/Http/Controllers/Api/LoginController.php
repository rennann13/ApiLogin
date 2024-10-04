<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) : JsonResponse {

        //Validar e-mail e senha
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            //Recuperar os dados do usuário
            $user = Auth::user();

            $token = $request->user()->createToken('api-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'user' => $user,
                'token'=> $token
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Login ou senha incorretos"
            ], 404);
        }
    }


    public function logout(User $user) : JsonResponse{
        try{
            $user->tokens()->delete();
            return response()->json([
                    'status' => true,
                    'message' => 'Deslogado com sucesso'
            ], 200);
        } catch (Exception $e){
            return response()->json([
                    'status' => false,
                    'message' => "Não deslogado"
            ], 400);
        }
    }
}
