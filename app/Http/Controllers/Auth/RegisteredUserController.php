<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'phoneNumber' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'turn' => ['required', 'string', 'max:50'],
        ]);

        $user = User::create([
            'nameCompany' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'turn' => $request->turn,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Se registro correctamente');
    }
}
