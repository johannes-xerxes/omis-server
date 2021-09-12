<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class CreateAccountWebController extends Controller
{
    public function index (Request $request) {
        try {
            $user = new User();
            $data = $request->all();

            if ($data['password'] === $data['confirm_password']) {
                $user->first_name = $data['first_name'];
                $user->middle_name = $data['middle_name'];
                $user->last_name = $data['last_name'];
                $user->email = $data['email'];
                $user->type = 'officer';
                $user->password = Hash::make($data['password']);
                $user->save();
            } else {
                throw new \Exception('Wrong password');
            }

            return redirect('/login');
        } catch (\Exception $e) {
            return view('guest.create-account');
        }
    }
}
