<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // 1. Validasi input dari form
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'nisn' => ['required', 'string', 'max:20', 'unique:users'], 
        'jenis_kelamin' => ['required', 'in:L,P'],
        'school_id' => ['required', 'exists:schools,id'], 
        'kelas' => ['required', 'string', 'max:50'],
        'alamat' => ['required', 'string'],
    ]);

    // 2. Simpan ke Database
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'siswa', // Default role
        'nisn' => $request->nisn,
        'jenis_kelamin' => $request->jenis_kelamin,
        'school_id' => $request->school_id,
        'kelas' => $request->kelas,
        'alamat' => $request->alamat,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('dashboard', absolute: false));
}
}
