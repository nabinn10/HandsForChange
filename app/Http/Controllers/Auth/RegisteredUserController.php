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
        // Validate incoming data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:15', 'unique:users'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'document' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'], // 2MB max
            'photopath' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'], // 2MB max
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'status' => 'required',
            'role'=> 'required'
        ]);

        // Handle file uploads
        // Handle file uploads
$documentPath = $request->file('document')
? $request->file('document')->store('images/userdocument', 'public')
: null;

$photoPath = $request->file('photopath')
? $request->file('photopath')->store('images/profilephoto', 'public')
: null;

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'role' => $request->role,
            'status' => $request->status,

            'document' => $documentPath,
            'photopath' => $photoPath,
            'password' => Hash::make($request->password),
        ]);

        // Fire registration event
        event(new Registered($user));

        // Log in the new user
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard');
    }
}
