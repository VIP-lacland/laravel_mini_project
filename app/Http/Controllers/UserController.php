<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class UserController extends Controller
{
    // ==== HIỂN THỊ FORM ĐĂNG KÝ ====
    public function showRegister()
    {
        return view('register');
    }

    // ==== XỬ LÝ ĐĂNG KÝ ====
    public function register(Request $request)
    {
        $input = $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $input['password'] = bcrypt($input['password']);

        Users::create($input);

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

    // ==== HIỂN THỊ FORM ĐĂNG NHẬP ====
    public function showLogin()
    {
        return view('login');
    }

    // ==== XỬ LÝ ĐĂNG NHẬP ====
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // bỏ role, redirect mặc định sau login
            return redirect('/users');
        }

        return back()->with('error', 'Sai email hoặc password');
    }

    // ==== LOGOUT ====
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // ==== HIỂN THỊ DANH SÁCH USERS ====
    public function index()
    {
        $users = Users::all();
        return view('index', compact('users'));
    }

    // ==== HIỂN THỊ FORM TẠO USER ====
    public function create()
    {
        return view('create');
    }

    // ==== XỬ LÝ TẠO USER ====
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        Users::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/users');
    }

    // ==== HIỂN THỊ FORM CHỈNH SỬA USER ====
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('edit', compact('user'));
    }

    // ==== XỬ LÝ CẬP NHẬT USER ====
    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6'
        ]);

        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('/users');
    }

    // ==== XÓA USER ====
    public function delete($id)
    {
        Users::findOrFail($id)->delete();
        return redirect('/users');
    }
}