<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

        // team category methods

        public function viewTeamCategories()
        {
            
            return view('Admin.teamCategory');
        }
    
    // update profile setting 

public function showSettingsForm()
{
    return view('Admin.settings');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->route('settings')->with('error', 'Current password is incorrect.');
    }

    $user->update([
        'password' => bcrypt($request->new_password),
    ]);

    return redirect()->route('settings')->with('success', 'Password updated successfully.');
}

public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        // Add other profile fields as needed...
    ]);
    Auth::user()->update([
        'name' => $request->name,
        'email' => $request->email,
        // Update other profile fields...
    ]);

    return redirect()->route('settings')->with('success', 'Profile updated successfully.');
}
}
