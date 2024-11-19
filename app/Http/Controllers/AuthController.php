<?php
namespace App\Http\Controllers;

use App\Models\HududTopshiriq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login page
    public function loginPage()
    {
        return view('Auth.login');
    }

    // Handle user login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Regenerate session to avoid session fixation
            $request->session()->regenerate();

            return redirect()->route('user.tasks');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    // Fetch tasks for authenticated user
    public function userTasks()
    {
        $user = Auth::user(); // Auth::user() is now guaranteed to be available

        $tasks = HududTopshiriq::whereHas('hudud', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('tasks.index', compact('tasks'));
    }
}
