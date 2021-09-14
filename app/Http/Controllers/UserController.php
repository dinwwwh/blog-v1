<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a view for registering
     *
     * @return \Illuminate\Http\Response
     */
    public function viewRegister()
    {
        return view('register');
    }

    /**
     * Handle registering of user
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'avatar_path' => "https://avatars.dicebear.com/api/male/$request->name.svg",
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return redirect()
            ->back()
            ->with('successRegister', 'Đăng ký tài khoản thành công.');
    }
}
