<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

use Laravel\Passport\TokenRepository;
use Laravel\Passport\Token;
class AuthController extends Controller
{   
     
  
    public  function  register(Request $request){
      
        $data = User::where('email', '=',$request->email)->get();
        if (count($data) != 0) {
            $respuesta = "este usuario  ya esta registrado ";

            return response()->json([
                'ok'    => false,
                'menssage'  => $respuesta
                
            ]);
        } else{
         $Usuarios=new User([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password)

    ]);
        
       if ($Usuarios->save()){
        $token= $Usuarios->createToken('authToken')->accessToken;
        $menssage="Usuario registrado correctamente";
        return response()->json([
            'ok'    => true,
            'menssage'  => $menssage,
            //'token'=>$token
        ]);
        }
    }
       

        
        
        //return $token;      
      }
    
      public function login(Request $request){
        //$Usuarios=new User();
      
        $data = $request->only('email','password');
        //var_dump(Auth::attempt($data));
        if (!Auth::attempt($data)) {
            return response()->json([
                'ok'    => false,
                'user'  => 'Error de credenciales',
            ]);
        }

        $token = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
            'ok'    => true,
            'user'  => Auth::user(),
            'token' => $token 
        ]);
        }
    
        public function me(){
            return response()->json([
                'ok'    => true,
                'user'  => Auth::user(),
            ]);
          }
 


    public  function logout(Request $request){ 
   $accessToken = Auth::user()->token();
            $token= $request->user()->tokens->find($accessToken);
            //dd($token);
            $token->delete();
            $response=array();
            $response['status']=1;
            $response['statuscode']=200;
            $response['msg']="Successfully logout";
            return response()->json($response)->header('Content-Type', 'application/json');
}
}