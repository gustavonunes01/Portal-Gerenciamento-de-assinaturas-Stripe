<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller as BaseControllerIlluminate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class LoginController extends BaseControllerIlluminate
{
    public function login(Request $request)
    {
        $reqFake = Request::create('/oauth/token', 'POST', [
            'grant_type' => $request->get('grant_type'),
            'client_id' => $request->get('client_id'),
            'client_secret' => $request->get('client_secret'),
            'username' => $request->get('email'),
            'password' => $request->get('password'),
            'scope' => '', // Se você tem escopos definidos, você os ajustaria aqui.
        ]);
    
        $response = app()->handle($reqFake);
        $responseBody = json_decode($response->getContent(), true);
        
        if (isset($responseBody['access_token'])) {
            $user = User::where('email', $request->get('email'))->firstOrFail();
            $permissoes = $user->getAllPermissions()->pluck('name');
            $menus = $user->menus();
            unset($user->permissions);
            unset($user->roles);

            return response()->json([
                'user' => $user, 
                'access_token' => $responseBody['access_token'], 
                'permissoes' => $permissoes,
                'menus' => $menus
            ]);
        } else {
            return response()->json(
                [
                    'error' => 'Unauthorized'
                    // , 'data' => $responseBody
                ], 401);
        }
    }


    public function logout(Request $request)
    {

       // Obtendo o token do usuário atual
       $token = $request->user()->token();

       // Revogando o token
       $token->revoke();

       // Retornando resposta
       return response()->json(['message' => 'Deslogado com sucesso!'], 200);
       
    }
}
