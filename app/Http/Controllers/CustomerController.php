<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;

class CustomerController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'customer') {
            abort(403, 'Unauthorized');
        }

        $user = auth()->user();
        $stamps = Stamp::all()->map(function ($stamp) use ($user) {
            $stamp->collected = $user->stamps->contains($stamp->id); // Add a collected flag
            return $stamp;
        });

        return view('customer.dashboard', compact('stamps'));
    }


    public function collectStamp($id)
    {
        $user = auth()->user();
        $stamp = Stamp::findOrFail($id);

        // Attach stamp to user if not already collected
        if (!$user->stamps->contains($id)) {
            $user->stamps()->attach($id);
        }

        return redirect()->route('customer.dashboard')->with('success', 'Stamp collected!');
    }
}
