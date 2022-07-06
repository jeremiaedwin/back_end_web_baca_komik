<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6'
        ]);

        $email = $request->email;
        $password = Hash::make($request->password);

        $user = new User();
        $user->email = $email;
        $user->password =$password;
        if($user->save())
        {
            $out = [
                "message" => "register_success",
                "code"    => 201,
            ];
        } else {
            $out = [
                "message" => "vailed_regiser",
                "code"   => 404,
            ];
        }

        return response()->json($out, $out['code']);

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $email)->first();
        if(!$user)
        {
            $out = [
                "message" => "Login Failed (Email)",
                "code" => 401,
                "result" => [
                    "token" => null,
                ]
            ];
            return response()->json($out, $out['code']);
        }

        if(Hash::check($password, $user->password))
        {
            $newToken = $this->generateRandomString();
            $user->token = $newToken;
            $user->save();
            $out = [
                "message" => "Login Success",
                "code" => 201,
                "result" => [
                    "token" => $newToken,
                ]
            ];
        } else
        {
            $out = [
                "message" => "Login Failed",
                "code" => 401,
                "result" => [
                    "token" => null,
                ]
            ];
        }
        return response()->json($out, $out['code']);
    }

    private function generateRandomString($length = 80)
    {
        $karakter = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $panjang_karakter = strlen($karakter);
        $str = '';
        for($i = 0; $i <= $length; $i++)
        {
            $str .= $karakter[rand(0,$panjang_karakter - 1)];
        }
        return $str;
    }
}