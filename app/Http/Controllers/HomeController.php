<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Transaction;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $current_user_id = Auth::id();

        $expenses = 0;
        $income = 0;
        $transactions = Transaction::select(['id', 'from_user', 'to_user', 'amount'])
            ->where('from_user', $current_user_id)
            ->orWhere('to_user', $current_user_id)->limit(8)->latest()->get();

        return view('pages.home')->with([
            'transactions' => $transactions,
            'income' => $income,
            'expenses' => $expenses
        ]);
    }
}
