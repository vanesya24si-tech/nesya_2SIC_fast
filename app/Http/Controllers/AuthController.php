<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // =========================
    // TAMPILAN LOGIN
    // =========================
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function login(Request $request)
    {
        // Jika form belum dikirim, tampilkan login
        if (!$request->email || !$request->password) {
            return view('auth.login');
        }

        $email    = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {

            Auth::login($user);

            session(['last_login' => now()]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput();
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('auth.index');
    }

    // =========================
    // FORM SIGNUP
    // =========================
    public function signup()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $roles = ['Super Admin', 'Mitra', 'Pelanggan'];

        return view('auth.signup', compact('roles'));
    }

    // =========================
    // PROSES REGISTER
    // =========================
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|in:Super Admin,Mitra,Pelanggan',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Akun berhasil dibuat!');
    }
}
