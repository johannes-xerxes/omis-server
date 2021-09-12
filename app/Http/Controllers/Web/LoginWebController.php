<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\JWTAuth;

class LoginWebController extends Controller
{
    public function index(Request $request)
    {
        try {
            $token = null;
            $data = $request->all();

            $user = User::where('email', $data['email'])
                ->first();

            if (Hash::check($data['password'], $user->password)) {
                $request->session()->put('user_session', $user->id);
                return redirect('/dashboard');
            } else {
                return redirect('/login');
            }

        } catch (\Exception $e) {
            return $e;
        }
    }
}
