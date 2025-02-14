<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stamp;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $users = User::all();
        $stamps = Stamp::all(); // Fetch all stamps

        return view('admin.dashboard', compact('users', 'stamps'));
    }

    // Edit user details
    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.editUser', compact('user'));
    }

    // Update user details
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate and update user details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'poly' => 'nullable|string',
            'major' => 'nullable|string',
            'marketing' => 'nullable|boolean',
            'role' => 'required|in:admin,customer', // Validate role
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'poly' => $request->poly,
            'major' => $request->major,
            'marketing' => $request->marketing,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }

    // Display the stamp management page
    public function showStamps()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $stamps = Stamp::all(); // Get all stamps

        return view('admin.dashboard', compact('stamps'));
    }

    // Create a new stamp
    public function createStamp(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:stamps,number',
            'owner' => 'required|string|max:255',
            'secret' => 'required|string|max:255',
        ]);

        Stamp::create([
            'number' => $request->number,
            'owner' => $request->owner,
            'secret' => $request->secret,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Stamp created successfully');
    }

    // Edit an existing stamp
    public function editStamp($id)
    {
        $stamp = Stamp::findOrFail($id);
        return view('admin.editStamp', compact('stamp'));
    }

    // Update an existing stamp
    public function updateStamp(Request $request, $id)
    {
        $request->validate([
            'number' => 'required|unique:stamps,number,' . $id,
            'owner' => 'required|string|max:255',
            'secret' => 'required|string|max:255',
        ]);

        $stamp = Stamp::findOrFail($id);
        $stamp->update([
            'number' => $request->number,
            'owner' => $request->owner,
            'secret' => $request->secret,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Stamp updated successfully');
    }

    // Delete a stamp
    public function deleteStamp($id)
    {
        $stamp = Stamp::findOrFail($id);
        $stamp->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Stamp deleted successfully');
    }
}