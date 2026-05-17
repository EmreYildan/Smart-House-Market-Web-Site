<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        return view('wallet.index');
    }

    public function topUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|in:50,100,200,500,1000',
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|string|min:16|max:19',
            'card_expiry' => 'required|string|max:5',
            'card_cvv' => 'required|string|min:3|max:3',
        ]);

        $user = Auth::user();

        $user->increment('balance', $request->amount);

        return back()->with('success', $request->amount . ' TL bakiye hesabınıza yüklendi.');
    }
}
