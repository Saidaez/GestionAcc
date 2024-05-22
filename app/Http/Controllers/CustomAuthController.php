<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    /*public function afiche(){
        $employees =User::all();
        return view('adminDashboard',['employees'=>$employees]
        );
    }*/
    public function customLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin' && $request->role === 'admin') {
            return redirect()->route('adminDashboard');
        } elseif ($user->role === 'employee' && $request->role === 'employee') {
            return redirect()->route('employeeDashboard');
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors(['role' => 'Role does not match.']);
        }
    }

    return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
}

    public function registration()
    {
        return view('auth.register');
        }
        public function customRegistration(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,employee', // التحقق من أن الدور موجود في القائمة المسموح بها
    ]);

    // إنشاء المستخدم باستخدام القيمة المحددة لحقل الدور
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role, // استخدم قيمة الدور المحددة
    ]);

    // يمكنك استخدام الشرطية هنا لتوجيه المستخدم بناءً على دوره المحدد
    if ($user) {
        Auth::login($user);

        if ($user->role === 'employee') {
            return redirect()->route('employeeDashboard')->withSuccess('User has been registered successfully.');
        }
    }

    // في حالة فشل التسجيل، عد إلى صفحة التسجيل مع رسالة الخطأ
    return redirect()->route('register')->withErrors(['role' => '']);
}

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}