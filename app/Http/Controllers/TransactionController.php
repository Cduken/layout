<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'status' => 'required|string',
        ]);

        Transaction::create($validated);



        return Inertia::render('Cart', [
            'message' => 'Transaction successful'
        ]);
    }
}
